<?php

include 'padaria.sql';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $id_do_produto = $_POST['id_do_produto'];
    $quantidade = $_POST['quantidade'];
    $subtotal = $_POST['subtotal'];

    $sql="INSERT INTO item venda (id_do_produto, quantidade, subtotal ) VALUES(:id_do_produto, :quantidade, :subtotal )";

    $stmt =  $conn->prepare($sql);

    $stmt->bindParam(':id_do_produto',$id_do_produto);
    $stmt->bindParam(':quantidade',$quantidade);
    $stmt->bindParam(':subtotal',$subtotal);

    $stmt->execute();

    header('location: cadastro.produtos.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   

    <h1>Cadastrar Produto</h1>
    <form action="cadastro.produtos.php" method="POST">
        <label for="id_do_produto">Nome Produto:</label>
        <input type="text" id="id_do_produto" name="quantidade" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="text" id="quantidade" name="quantidade" required><br>

        <label for="subtotal">Preço Unitário:</label>
        <input type="text" id="subtotal" name="subtotal" required><br>

        <button type="submit">Cadastrar Produto</button>
    </form>
    
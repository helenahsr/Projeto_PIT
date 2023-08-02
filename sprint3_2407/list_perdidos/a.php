<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$nome = $_SESSION['cookie'];
// definições de host, database, usuário e senha
$host = "localhost";
$db   = "projeto_pit";
$user = "root";
$pass = "";
// conecta ao banco de dados
$con = mysqli_connect($host, $user, $pass);
// seleciona a base de dados em que vamos trabalhar
mysqli_select_db($con, $db);
// cria a instrução SQL que vai selecionar os dados

$idid = $_POST['id'];

$query = sprintf("SELECT nome_pet, raca, idade FROM procura WHERE id = $idid");
// executa a query
$dados = mysqli_query($con, $query) or die();
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?= $linha['nome_pet'] ?>
</body>

</html>
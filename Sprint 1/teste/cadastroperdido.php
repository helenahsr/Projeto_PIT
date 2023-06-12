<?php
    if(isset($_POST['cadastrarper']))
    {
        $nome_pet = $_POST['nome_pet'];
        $idade_pet = $_POST['idade_pet'];
        $raca_pet = $_POST['raca_pet'];
        $porte_pet = $_POST['porte_pet'];
        $nome_dono = $_POST['nome_dono'];
        $telefone_dono = $_POST['telefone_dono'];
        $regiao = $_POST['regiao'];
        $data_perda = $_POST['data_perda'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        $conn = mysqli_connect($host,$user,$pass,$dbname);

        $sql = "INSERT INTO procura values('default','$nome_pet','$idade_pet','$raca_pet','$porte_pet','$nome_dono','$telefone_dono','$regiao','$data_perda')";
        mysqli_query($conn,$sql);
    }
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
    <form action="#" method="post">
        <label for="">Nome do Pet:</label>
        <input type="text" name="nome_pet"><br>
        <label for="">Idade do Pet:</label>
        <input type="text" name="idade_pet"><br>
        <label for="">Raça do Pet:</label>
        <input type="text" name="raca_pet" maxlength="50"><br>
        <label for="">Porte do Pet:</label>
        <input type="text" name="porte_pet"><br>
        <label for="">Nome do Dono:</label>
        <input type="text" name="nome_dono"><br>
        <label for="">Telefone:</label>
        <input type="text" name="telefone_dono" maxlength="14"><br>
        <label for="">Região:</label>
        <input type="text" name="regiao"><br>
        <label for="">Data da perda:</label>
        <input type="date" name="data_perda"><br><br>
        <input type="submit" name="cadastrarper" value="Cadastrar Pet">
    </form>
</body>
</html>

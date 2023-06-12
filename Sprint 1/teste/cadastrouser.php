<?php
    if (isset($_POST['cadastrar'])){
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        $conn = mysqli_connect($host,$user,$pass,$dbname);

        $sql = "INSERT INTO usuario values('$cpf','$nome','$email','$senha')";
        mysqli_query($conn,$sql);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>Patinhas Felizes - Proto</title>
</head>
<body>
    <header>
        <div class="container-header">
            <form action="index.php" method="post">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" maxlength="11" required><br>
                <label for="nome">NOME:</label>
                <input type="text" name="nome" id="nome" maxlength="100" required><br>
                <label for="email">E-MAIL:</label>
                <input type="email" name="email" id="email" maxlength="150" required><br>
                <label for="nome">SENHA:</label>
                <input type="text" name="senha" id="senha" maxlength="20" required><br><br>
                <input type="submit" name="cadastrar" value="Cadastrar">
            </form>
        </div>
    </header>
</body>
</html>
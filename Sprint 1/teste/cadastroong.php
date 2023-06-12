<?php
    if (isset($_POST['cadastrar'])){
        $cnpj = $_POST['cnpj'];
        $nome_ong = $_POST['nome_ong'];
        $email_ong = $_POST['email_ong'];
        $telefone_ong = $_POST['telefone_ong'];
        $senha_ong = $_POST['senha_ong'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        $conn = mysqli_connect($host,$user,$pass,$dbname);

        $sql = "INSERT INTO ong() values('$cnpj','$nome_ong','$email_ong','$telefone_ong','$senha_ong')";
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
            <form action="#" method="post">
                <label for="cpf">CNPJ:</label>
                <input type="text" name="cnpj" maxlength="18" required><br>
                <label for="nome">NOME DA ONG:</label>
                <input type="text" name="nome_ong" id="nome" maxlength="100" required><br>
                <label for="email">E-MAIL DA ONG:</label>
                <input type="email" name="email_ong" id="email" maxlength="150" required><br>
                <label for="telefone">TELEFONE DA ONG:</label>
                <input type="tel" name="telefone_ong" id="telefone" maxlength="14" required><br>
                <label for="nome">SENHA:</label>
                <input type="text" name="senha_ong" id="senha" maxlength="20" required><br><br>
                <input type="submit" name="cadastrar" value="Cadastrar">
            </form>
        </div>
    </header>
</body>
</html>
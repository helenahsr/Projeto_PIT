<?php
    header('Content-Type: text/html; charset=utf-8');

    if(isset($_POST['cadastrar']))
    {

        $cnpj = $_POST['cnpj'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $site = $_POST['site'];
        $senha = $_POST['senha'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        if ($cnpj == '' or $nome == '' or $email == '' or $telefone == '' or $endereco == '' or $site == '' or $senha == '')
        {
            echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='c_user.html';</script>";
        }
        else
        {
        $conn = mysqli_connect($host,$user,$pass,$dbname);

        $sql = "INSERT INTO veterinario values('$cnpj','$nome','$email','$telefone','$endereco', '$site','$senha')";
        mysqli_query($conn,$sql);

        echo"<script language='javascript' type='text/javascript'>alert('Clínica veterinária cadastrada com sucesso!');window.location.href='../login/login.html';</script>";
        }

    }

?>
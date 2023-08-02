<?php

    if(isset($_POST['cadastrar']))
    {
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cidade = $_POST['cidade'];
        $senha = $_POST['senha'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        if ($cpf == '' or $nome == '' or $email == '' or $telefone == '' or $cidade == '' or $senha == '')
        {
            echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='index.html';</script>";
        }
        else
        {
        $conn = mysqli_connect($host,$user,$pass,$dbname);

        $sql = "INSERT INTO tutor values('$cpf','$nome','$email','$telefone','$cidade','$senha')";
        mysqli_query($conn,$sql);

        echo"<script language='javascript' type='text/javascript'>alert('Tutor voluntário cadastrado com sucesso!');window.location.href='../login/login.html';</script>";
        }
    }

?>
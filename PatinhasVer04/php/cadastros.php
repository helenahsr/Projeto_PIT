<?php
    header('Content-Type: text/html; charset=utf-8');

    if(isset($_POST['cadastrar']))
    {
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cep = $_POST['cep'];
        $senha = $_POST['senha'];
        $confsenha = $_POST['confsenha'];
        
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        if ($cpf == '' or $nome == '' or $email == '' or $telefone == '' or $cep == '' or $senha == '')
        {
            echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='index.html';</script>";
        }
        else if ($senha != $confsenha) {
            echo"<script language='javascript' type='text/javascript'>alert('As senhas não conferem! Seu cadastro não foi concluído!');window.location.href='index.html';</script>";
        }
        else
        {
        $conn = mysqli_connect($host,$user,$pass,$dbname);

        $sql = "INSERT INTO usuario values('$cpf','$nome','$email','$telefone','$cep','$senha','')";
        mysqli_query($conn,$sql);

        echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='../login/index.html';</script>";        }
    }
?>
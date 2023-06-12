<?php

header('Content-Type: text/html; charset=utf-8');

    $entrar = $_POST['entrar'];
    $entrarong = $_POST['entrarong'];

    if (isset($entrar)) {

        $login = $_POST['cpf'];
        $senha = $_POST['senha'];

        $connect = mysqli_connect('localhost','root','');
        $db = mysqli_select_db($connect,'projeto_pit');

        $verifica = mysqli_query($connect,"SELECT * FROM usuario WHERE cpf = '$login' AND senha_usuario = '$senha'") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='login.html';</script>";
            die();
        }else{
            //Tentar dar um SELECT para que seja selecionado o nome do usuário e exibir na página logada pelo usuário.
            setcookie("cpf",$login);
            header("Location:success.html");
        }
    }
    else if (isset($entrarong)) {

        $login = $_POST['cnpj'];
        $senha = $_POST['senha'];

        $connect = mysqli_connect('localhost','root','');
        $db = mysqli_select_db($connect,'projeto_pit');

        $verifica = mysqli_query($connect,"SELECT * FROM ong WHERE cnpj = '$login' AND senha_ong = '$senha'") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='login_ong.html';</script>";
            die();
        }else{
            //Tentar dar um SELECT para que seja selecionado o nome da ONG e exibir na página logada pelo usuário.
            setcookie("cnpj",$login);
            header("Location:success.html");
        }
    }
?>
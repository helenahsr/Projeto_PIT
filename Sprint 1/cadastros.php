<?php

    header('Content-Type: text/html; charset=utf-8');

    if(isset($_POST['cadastrar']))
    {
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        if ($cpf == '' or $nome == '' or $email == '' or $telefone == '' or $endereco == '' or $senha == '')
        {
            echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='c_user.html';</script>";
        }
        else
        {
        $conn = mysqli_connect($host,$user,$pass,$dbname);

        $sql = "INSERT INTO usuario values('$cpf','$nome','$email','$telefone','$endereco','$senha')";
        mysqli_query($conn,$sql);

        echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html';</script>";
        }
    }
    else if(isset($_POST['cadastrarper']))
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

        if ($nome_pet == '' or $idade_pet == '' or $raca_pet == '' or $porte_pet == '' or $regiao == '' or $nome_dono == '' or $data_perda == '' or $telefone_dono == '')
        {
            echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='c_petp.html';</script>";
        }
        else
        {
            $conn = mysqli_connect($host,$user,$pass,$dbname);

            $sql = "INSERT INTO procura values('default','$nome_pet','$idade_pet','$raca_pet','$porte_pet','$nome_dono','$telefone_dono','$regiao','$data_perda')";
            mysqli_query($conn,$sql);

            echo"<script language='javascript' type='text/javascript'>alert('Pet perdido cadastrado com sucesso!');window.location.href='c_petp.html';</script>";
        }
    }
    else if(isset($_POST['cadastroadopt']))
    {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $raca = $_POST['raca'];
        $porte = $_POST['porte'];
        $ong = $_POST['ong'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        if ($nome == '' or $idade == '' or $raca == '' or $porte == '' or $ong == '')
        {
            echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='c_pet.html';</script>";
        }
        {
            $conn = mysqli_connect($host,$user,$pass,$dbname);

            $sql = "INSERT INTO adocao values('default','$nome','$raca','$porte','$idade','$ong')";
            mysqli_query($conn,$sql);

            echo"<script language='javascript' type='text/javascript'>alert('Pet para adoção cadastrado com sucesso!');window.location.href='c_pet.html';</script>";
        }
    }
    else if(isset($_POST['cadastrong']))
    {
        $nome = $_POST['nome_ong'];
        $email = $_POST['email_ong'];
        $telefone = $_POST['telefone_ong'];
        $endereco = $_POST['endereco_ong'];
        $cnpj = $_POST['cnpj'];
        $senha = $_POST['senha_ong'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        if ($nome == '' or $email == '' or $telefone == '' or $endereco == '' or $cnpj == '' or $senha == '')
        {
            echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='c_ong.html';</script>";
        }
        {
            $conn = mysqli_connect($host,$user,$pass,$dbname);

            $sql = "INSERT INTO ong values('$cnpj','$nome','$email','$telefone','$senha','$endereco')";
            mysqli_query($conn,$sql);

            echo"<script language='javascript' type='text/javascript'>alert('ONG cadastrada com sucesso!');window.location.href='login_ong.html';</script>";
        }
    }
?>
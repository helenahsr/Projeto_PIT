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
            echo "<script>alert('Você não preencheu todos os campos!');</script>";
            echo "<a href='cuser.html'>Voltar</a>";
        }
        else
        {
        $conn = mysqli_connect($host,$user,$pass,$dbname);

        $sql = "INSERT INTO usuario values('$cpf','$nome','$email','$telefone','$endereco','$senha')";
        mysqli_query($conn,$sql);

        header("Location: index.html");
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
            echo "<script>alert('Você não preencheu todos os campos!');</script>";
            echo "<a href='cpetp.html'>Voltar</a>";
        }
        else
        {
            $conn = mysqli_connect($host,$user,$pass,$dbname);

            $sql = "INSERT INTO procura values('default','$nome_pet','$idade_pet','$raca_pet','$porte_pet','$nome_dono','$telefone_dono','$regiao','$data_perda')";
            mysqli_query($conn,$sql);
            header("Location: index.html");
        }
    }
    
?>
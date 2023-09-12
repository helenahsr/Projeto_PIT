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

        echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='../landing_page/index.html';</script>";
        }
    }
    else if(isset($_POST['cadastrarper']))
    {
        $nome_pet = $_POST['nomePet'];
        $idade_pet = $_POST['idadePet'];
        $raca_pet = $_POST['racaPet'];
        $porte_pet = $_POST['portePet'];
        $nome_dono = $_POST['nomeDono'];
        $telefone_dono = $_POST['telDono'];
        $regiao = $_POST['regiao'];
        $data_perda = $_POST['dataPerda'];

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
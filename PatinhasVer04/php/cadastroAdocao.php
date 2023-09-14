<?php
header('Content-Type: text/html; charset=utf-8');

if(isset($_POST['cadastrar']))
{
    $nome = $_POST['nomePet'];
    $idade = $_POST['idadePet'];
    $raca = $_POST['racaPet'];
    $porte = $_POST['portePet'];
    $sexo = $_POST['sexoPet'];
    $responsavel = $_POST['responsavel'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $regiao = $_POST['regiao'];
    $descricao = $_POST['descricao'];
    $imagem = $_POST['imagem'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'projeto_pit';

    if ($nome == '' or $idade == '' or $raca == '' or $porte == '' or $sexo == '' or $responsavel == '' or $email == '' or $telefone = '' or $regiao == '' or $descricao == '' or $imagem == '')
    {
        echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='../cadastro_adoção/index.html';</script>";
    }
    else
    {
        $conn = mysqli_connect($host,$user,$pass,$dbname);

        $sql = "INSERT INTO adocao values('default','$nome','$raca','$porte','$idade','$sexo','$responsavel','$email','$telefone','$regiao','$descricao','$imagem')";
        mysqli_query($conn,$sql);

        echo"<script language='javascript' type='text/javascript'>alert('Pet para adoção cadastrado com sucesso!');window.location.href='../lista_adocao/index.php';</script>";
    }
}
?>
<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$cpf = $_SESSION["idcookie"];

    if(isset($_POST['cadastrar']))
    {
        $nomePet = $_POST['nomePet'];
        $idadePet = $_POST['idadePet'];
        $racaPet = $_POST['racaPet'];
        $portePet = $_POST['portePet'];
        $sexoPet = $_POST['sexoPet'];

        $nomeDono = $_POST['nomeDono'];
        $telDono = $_POST['telDono'];
        $regiao = $_POST['regiao'];
        $dataPerda = $_POST['dataPerda'];
        $descricao = $_POST['descricao'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        if ($nomePet == '' or $idadePet == '' or $racaPet == '' or $portePet == '' or $sexoPet == '' or $regiao == '' or $nomeDono == '' or $dataPerda == '' or $telDono == '' or $descricao == '')
        {
            echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='../cadastro_perdido/index.html';</script>";
        }
        else
        {
            if($_FILES['imagem'] == '')
            {
                echo"<script language='javascript' type='text/javascript'>alert('Você não inseriu uma imagem Tente novamente!');window.location.href='../cadastro_perdido/index.html';</script>";
            }
            else
            {
                $arquivo =  $_FILES['imagem'];
                var_dump($arquivo['tmp_name']);
        
                if($arquivo != NULL || $arquivo != '')
                {
                    $arq = fopen($arquivo['tmp_name'],'rb');
                    var_dump($arq);
                    $conteudo = fread ($arq, filesize ($arquivo['tmp_name']));
                    $blob = base64_encode($conteudo);
                }
            }

            $conn = mysqli_connect($host,$user,$pass,$dbname);

            $sql = "INSERT INTO procura values('default','$nomePet','$idadePet','$racaPet','$portePet','$sexoPet','$cpf','$nomeDono','$telDono','$regiao','$dataPerda','$descricao','$blob')";
            mysqli_query($conn,$sql);

            echo"<script language='javascript' type='text/javascript'>alert('Pet perdido cadastrado com sucesso!');window.location.href='index.html';</script>";
        }
    }
?>
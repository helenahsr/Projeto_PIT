<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

    if($_SESSION['cookie'] == '')
    {
        header("Location: ../login/index.html");
    }

    $host = "localhost";
    $db   = "projeto_pit";
    $user = "root";
    $pass = "";

    $idPet = $_POST['vermais'];

    $con = mysqli_connect($host, $user, $pass);
    mysqli_select_db($con, $db);

    $query = sprintf("SELECT * FROM procura WHERE idPer = $idPet");
    $dados = mysqli_query($con, $query) or die();
    $linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonte Acme -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <!-- Fonte Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Inter&display=swap" rel="stylesheet">
    <!--Link da Favicon-->
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <!--Link do CSS-->
    <link rel="stylesheet" href="../css/style.css">
    <title>Perfil de Pet</title>
</head>
<body>
    <header>
        <div class="nav-bar">
            <img src="../img/logo.png" alt="Patinhas Felizes">
            <ul>
                <li><a href="./index.html">Início</a></li>
                <li><a href="">Seja um Voluntário</a></li>
                <li><a href="">Wiki Pet</a></li>
                <li><a href="">Contato</a></li>
            </ul>
        </div>
        <div class="login">
            <ul>
                <li class="username"><?= $_SESSION['cookie']; ?></li>
            </ul>
    </header>
    <main class="container_perfilpet">
        <div class="perfil_pet">
            <div class="informacoes_pet">
                <ul class="list_infos">
                    <li id="nomePet">Nome: <?=$linha['nomePer']?></li>
                    <li><span class="setaBold">Descrição: </span><?=$linha['descricaoPer']?></li>
                    <li><span class="setaBold">Idade: </span><?=$linha['idadePer']?></li>
                    <li><span class="setaBold">Raça: </span><?=$linha['racaPer']?></li>
                    <li><span class="setaBold">Porte: </span><?=$linha['portePer']?></li>
                    <li><span class="setaBold">Sexo: </span><?=$linha['sexoPer']?></li>
                    <li><span class="setaBold">Responsável: </span><?=$linha['nomeDono']?></li>
                    <li><span class="setaBold">Telefone: </span><?=$linha['telDono']?></li>
                    <li><span class="setaBold">Região: </span><?=$linha['regiãoPer']?></li>
                </ul>
            </div>
            <div class="container-fotoBotao">
                <div class="imgPet">
                    <img src="<?=$linha['imagemPer']?>" alt="<?=$linha['nomePer']?>">
                </div>
                <button class="btnEncontrado">
                    <b>Achei o <?=$linha['nomePer']?></b>
                </button>
            </div>
            <img class="paw_background" src="../img/paw_background.svg" alt="Patinhas Felizes">
        </div>
    </main>
    <footer class="acme branco">
        Feito pelo time incível do ©️ Patinhas Felizes - 2023
    </footer>
</body>
</html>
<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

    if($_SESSION['cookie'] == '')
    {
        header("Location: ../login/index.html");
    }

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
    <title>Menu Principal - Patinhas Felizes</title>
</head>
<body>
<header>
        <div class="nav-bar">
            <img src="../img/logo.png" alt="Patinhas Felizes">
            <ul>
                <li><a href="./index.html">Início</a></li>
                <li><a href="../wikiPet/index.html">Wiki Pet</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </div>
        <div class="login">
            <ul>
                <li class="username"><?= $_SESSION['cookie']; ?></li>
            </ul>
    </header>
    <main class="menu">
        <button class="btnMenu" onclick="window.location.href='../cadastro_adoção/index.html'" class="dog">
            <div class="titulo">
                CADASTRAR<br>UM PET
            </div>
            <div class="imagem dog">
                <img src="../img/dog.svg" alt="">
            </div>
        </button>
        <button class="btnMenu" onclick="window.location.href='../lista_adocao/index.php'" class="cat">
            <div class="titulo">
                ADOTAR<br>UM PET
            </div>
            <div class="imagem cat">
                <img src="../img/cat.svg" alt="">
            </div>
        </button>
        <button class="btnMenu" onclick="window.location.href='../lista_perdidos/index.php'" class="cat">
            <div class="titulo">
                ACHE O<br>SEU PET
            </div>
            <div class="imagem rabit">
                <img src="../img/rabit.svg" alt="">
            </div>
        </button>
        <button class="btnMenu" onclick="window.location.href='../cadastro_perdido/index.html'" class="cock">
            <div class="titulo">
                CADASTRAR<br>UM PET<br>PERDIDO
            </div>
            <div class="imagem cock">
                <img src="../img/cock.svg" alt="">
            </div>
        </button>
    </main>
    <aside class="menuButton acme">
        <a href="../landing_page/index.html">Ir para a Landing Page</a>
    </aside>
    <footer class="acme branco">
        Feito pelo time incrível do ©️ Patinhas Felizes - 2023
    </footer>
</body>
</html>
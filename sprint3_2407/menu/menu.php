<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$nome = $_SESSION['cookie'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Menu - Patinhas</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="../img/logo.png" alt="Patinhas Felizes">
            </div>
            <div class="nav-bar">
                <ul>
                    <li class="nav-bar"><a href="../landing_page/index.html">Home</a></li>
                    <li class="nav-bar"><a href="../cadastro_tutor/index.html">Seja um Voluntário</a></li>
                    <li class="nav-bar"><a href="../cadastro_user/cadastro.html">Cadastre-se</a></li>
                    <li class="nav-bar"><a href="../login/login.html">Login</a></li>
                    <li class="nav-bar"><a href="../info_pages/cuidados.html">Saiba Mais</a></li>
                </ul>
            </div>
            <div class="perfil">
                <div class="username">
                    <div>
                        <?php echo $nome; ?>
                        <div class="dropdown">
                            <ul>
                                <li onclick="window.location.href='../perfil/index.php'" id="dados">Meus dados</li>
                                <li>Meus pets</li>
                                <li>Carrinho</li>
                                <li id="sair">Sair</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <img src="../img/user.png" alt="Fulano">
            </div>
        </header>
        <section>
            <span>O que deseja fazer?</span>
        </section>
        <main>
            <button onclick="window.location.href='../cadastro_pet/cadastro.html'" class="dog">
                <div class="titulo">
                    CADASTRAR<br>UM PET
                </div>
                <div class="imagem dog">
                    <img src="../img/dog.svg" alt="">
                </div>
            </button>
            <button onclick="window.location.href='../list_adocao/index.php'" class="cat">
                <div class="titulo">
                    ADOTAR<br>UM PET
                </div>
                <div class="imagem cat">
                    <img src="../img/cat.svg" alt="">
                </div>
            </button>
            <button onclick="window.location.href='../list_perdidos/index.php'" class="cat">
                <div class="titulo">
                    ACHE O<br>SEU PET
                </div>
                <div class="imagem cat">
                    <img src="../img/cat.svg" alt="">
                </div>
            </button>
            <button onclick="window.location.href='../cadastro_procura/cadastro.html'" class="cock">
                <div class="titulo">
                    PROCURAR<br>UM PET
                </div>
                <div class="imagem cock">
                    <img src="../img/cock.svg" alt="">
                </div>
            </button>

        </main>
    </div>
</body>

</html>
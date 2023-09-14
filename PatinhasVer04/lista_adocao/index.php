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

    $con = mysqli_connect($host, $user, $pass);
    mysqli_select_db($con, $db);

    $query = sprintf("SELECT * FROM adocao ORDER BY id_adocao DESC");
    $dados = mysqli_query($con, $query) or die();
    $linha = mysqli_fetch_assoc($dados);
    $total = mysqli_num_rows($dados);

    if(isset($_POST['buscar']))
    {
        $filtro = $_POST['filtro'];

        if($filtro == 'idadeasc')
        {
            $query = sprintf("SELECT * FROM adocao order by idade asc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if($filtro == 'idadedesc')
        {
            $query = sprintf("SELECT * FROM adocao order by idade desc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if($filtro == 'az')
        {
            $query = sprintf("SELECT * FROM adocao order by nome asc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if($filtro == 'za')
        {
            $query = sprintf("SELECT * FROM adocao order by nome desc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if ($filtro == "recentes" or $filtro == '')
        {
            $query = sprintf("SELECT * FROM adocao order by id_adocao desc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if ($filtro == "antigos")
        {
            $query = sprintf("SELECT * FROM adocao order by id_adocao asc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
    }
    else
    {
        $query = sprintf("SELECT * FROM adocao ORDER BY id_adocao DESC");
        // executa a query
        $dados = mysqli_query($con, $query) or die();
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        // calcula quantos dados retornaram
        $total = mysqli_num_rows($dados);
    }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Pets para Adoção - Patinhas Felizes</title>
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
    <section class="bannerTitulo">
        <div class="banner acme bannerTituloTexto">
            Pets para Adoção
        </div>
    </section>
    <section class="secaoFiltros">
        <div class="filtro branco acme">
            Filtros predefinidos:
            <form action="" class="inter" method="post">
                <select class="filtroSelect" name="filtro">
                    <option class="" value="recentes">Selecione um filtro</option>
                    <option class="" value="recentes">Mais Recentes</option>
                    <option class="" value="antigos">Mais Antigos</option>
                    <option class="" value="idadeasc">Idade Crescente</option>
                    <option class="" value="idadedesc">Idade Decrescente</option>
                    <option class="" value="az">Nome A - Z</option>
                    <option class="" value="za">Nome Z - A</option>
                </select>
                <input type="submit" class="acme" name="buscar" value="Buscar">
            </form>
        </div>
    </section>
    <main class="lista">
        <?php
	        // se o número de resultados for maior que zero, mostra os dados
	        if($total > 0) {
		    // inicia o loop que vai mostrar todos os dados
		    do {
        ?>
        <div class="containerPet">
            <img src="<?=$linha['imagem']?>" alt="<?=$linha['nome']?>"><br>
            <div class="infos">
                <form action="../perfil_petAdocao/index.php" method="post">
                    <div class="textos">
                        <b class="acme">Nome: </b> <?=$linha['nome']?> <br>
                        <b class="acme">Raça: </b><?=$linha['raca']?><br>
                        <b class="acme">Idade: </b><?=$linha['idade']?><br>
                        <b class="acme">Responsável: </b><?=$linha['responsavel']?>
                    </div><br>
                    <button class="acme" name="vermais" value="<?=$linha['id_adocao']?>"><b>Ver Mais</b></button>
                </form>
            </div>
        </div>
        <?php
		    // finaliza o loop que vai mostrar os dados
		    }
            while($linha = mysqli_fetch_assoc($dados));
	        // fim do if
	        }
        ?>
    </main>
    <footer class="acme branco">
        Feito pelo time incrível do ©️ Patinhas Felizes - 2023
    </footer>
</body>
</html>
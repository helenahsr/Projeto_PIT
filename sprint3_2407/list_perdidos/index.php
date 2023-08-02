<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    $nome = $_SESSION['cookie'];
    // definições de host, database, usuário e senha
    $host = "localhost";
    $db   = "projeto_pit";
    $user = "root";
    $pass = "";
    // conecta ao banco de dados
    $con = mysqli_connect($host, $user, $pass);
    // seleciona a base de dados em que vamos trabalhar
    mysqli_select_db($con, $db);
    // cria a instrução SQL que vai selecionar os dados

    $filtro = "recentes";
    $nomenome = '';

    if(isset($_POST['buscar']))
    {
        $filtro = $_POST['filtro'];

        if($filtro == 'idadeasc')
        {
            $query = sprintf("SELECT * FROM procura order by idade asc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if($filtro == 'idadedesc')
        {
            $query = sprintf("SELECT * FROM procura order by idade desc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if($filtro == 'az')
        {
            $query = sprintf("SELECT * FROM procura order by nome_pet asc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if($filtro == 'za')
        {
            $query = sprintf("SELECT * FROM procura order by nome_pet desc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if ($filtro == "recentes" or $filtro == '')
        {
            $query = sprintf("SELECT * FROM procura order by id desc");
            // executa a query
            $dados = mysqli_query($con, $query) or die();
            // transforma os dados em um array
            $linha = mysqli_fetch_assoc($dados);
            // calcula quantos dados retornaram
            $total = mysqli_num_rows($dados);
        }
        else if ($filtro == "antigos")
        {
            $query = sprintf("SELECT * FROM procura order by id asc");
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
        $query = sprintf("SELECT * FROM procura ORDER BY id DESC");
        // executa a query
        $dados = mysqli_query($con, $query) or die();
        // transforma os dados em um array
        $linha = mysqli_fetch_assoc($dados);
        // calcula quantos dados retornaram
        $total = mysqli_num_rows($dados);
    }

    if(isset($_POST['vermais']))
    {
        echo $nomenome;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Perdidos - Patinhas</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="../img/logo.png" alt="Patinhas Felizes">
            </div>
            <div class="nav-bar">
                <ul>
                    <li><a href="../landing_page/index.html">Home</a></li>
                    <li><a href="../cadastro_tutor/index.html">Seja um Voluntário</a></li>
                    <li><a href="../cadastro_user/cadastro.html">Cadastre-se</a></li>
                    <li><a href="../login/login.html">Login</a></li>
                    <li><a href="../info_pages/cuidados.html">Saiba Mais</a></li>
                </ul>
            </div>
            <?php
                if($nome != "")
                {
            ?>
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
            <?php
                }
            ?>
        </header>
        <section>
            <div class="filtro">
                Filtros predefinidos:
                <form action="" method="post">
                    <select name="filtro">
                        <option class="" value="recentes">Selecione um filtro</option>
                        <option class="" value="recentes">Mais Recentes</option>
                        <option class="" value="antigos">Mais Antigos</option>
                        <option class="" value="idadeasc">Idade Crescente</option>
                        <option class="" value="idadedesc">Idade Decrescente</option>
                        <option class="" value="az">Nome A - Z</option>
                        <option class="" value="za">Nome Z - A</option>

                    </select>
                    <input type="submit" name="buscar" value="Buscar">
                </form>
            </div>
        </section>
        <main>

            <?php
	            // se o número de resultados for maior que zero, mostra os dados
	            if($total > 0) {
		        // inicia o loop que vai mostrar todos os dados
		        do {
            ?>
                <form action="a.php" method="post">
                    <button class="pet" name="id" value="<?=$linha['id']?>">
                        Nome: <?=$linha['nome_pet']?><br>
                        Raça: <?=$linha['raca']?><br>
                        Idade: <?=$linha['idade']?><br>
                    </button>
                </form>
            <?php
            
		        // finaliza o loop que vai mostrar os dados
		        }
                while($linha = mysqli_fetch_assoc($dados));
	            // fim do if
	            }
            ?>      

        </main>
    </div>
</body>

</html>









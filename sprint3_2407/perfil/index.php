<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
$login = $_SESSION['idcookie'];

$connect = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connect, 'projeto_pit');

$select = "SELECT * FROM usuario WHERE cpf = '$login'";
$resultado = mysqli_query($connect, $select);
$row = mysqli_fetch_row($resultado);

$cpf = $row[0];
$nome = $row[1];
$email = $row[2];
$telefone = $row[3];
$endereco = $row[4];
$senha = $row[5];
$foto = $row[6];

//echo '<img src="data:image/png;base64,' . base64_encode($foto) . ' "width="50px" height="50px/>"';

if (isset($_POST['editar'])) {
    echo "<script>window.location.href='../editar/index.php';</script>";
}

if (isset($_POST['voltar'])) {
    echo "<script>window.location.href='../menu/menu.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Meus Dados - Patinhas</title>
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
                    <div> <?php echo $nome; ?>
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
        <main>
        <?php 
            
            if ($foto != '')
            {
                echo '<img src="data:image/png;base64,' . $foto . ' "width="500px" height="500px/"';
            }
            else
            {
                echo '<img src="../img/user.png"';
            }

        ?>
            <img src="./img/user.png" alt="">
            <div class="nome-usuario"><?php echo $nome; ?></div>
        </main>
        <section>
            <div class="container-form">
                <div class="container-dados">
                    <label for="titulo"><b>Seus dados</b></label><br><br>
                    <div class="caixa">
                        <label for="">Nome: </label>
                        <div class="texto"><?php echo $nome; ?></div>
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">CPF: </label>
                        <div class="texto"><?php echo $cpf; ?></div>
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">E-mail: </label>
                        <div class="texto"><?php echo $email; ?></div>
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">Endereço: </label>
                        <div class="texto"><?php echo $endereco; ?></div>
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">Telefone: </label>
                        <div class="texto"><?php echo $telefone; ?></div>
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">Senha: </label>
                        <div class="texto"><?php echo $senha; ?></div>
                        <br>
                    </div><br>
                    <form method="post">
                        <input type="submit" name="editar" value="Editar meus dados"><br><br>
                        <input type="submit" name="voltar" value="Voltar para o menu">
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
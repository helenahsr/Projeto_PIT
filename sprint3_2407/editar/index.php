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

if (isset($_POST['editar'])) {
    $edit_cpf = $_POST['cpf'];
    $edit_nome = $_POST['nome'];
    $edit_email = $_POST['email'];
    $edit_telefone = $_POST['telefone'];
    $edit_endereco = $_POST['endereco'];
    $edit_senha = $_POST['senha'];

    if($_FILES['foto'] == '')
    {
        $blob = '';
    }
    else
    {
        $arquivo =  $_FILES['foto'];
        var_dump($arquivo['tmp_name']);

        if($arquivo != NULL || $arquivo != '')
        {
            $arq = fopen($arquivo['tmp_name'],'rb');
            var_dump($arq);
            $conteudo = fread ($arq, filesize ($arquivo['tmp_name']));
            $blob = base64_encode($conteudo);
        }
    }


    if ($edit_cpf == "") 
    {
        $edit_cpf = $cpf;
    }

    if ($edit_nome == "") {
        $edit_nome = $nome;
    }

    if ($edit_email == "") {
        $edit_email = $email;
    }

    if ($edit_telefone == "") {
        $edit_telefone = $telefone;
    }

    if ($edit_endereco == "") {
        $edit_endereco = $endereco;
    }

    if ($edit_senha == "") {
        $edit_senha = $senha;
    }

    if ($blob == '')
    {
        $blob = $foto;
    }

    if ($edit_cpf != "" and $edit_nome != "" and $edit_email != "" and $edit_telefone != "" and $edit_endereco != "" and $edit_senha != "") {
        $update = "UPDATE usuario SET cpf = '$edit_cpf', nome_usuario = '$edit_nome', email_usuario = '$edit_email', telefone_usuario = '$edit_telefone', endereco = '$edit_endereco', senha_usuario = '$edit_senha', foto = '$blob' WHERE cpf = '$cpf'";
        mysqli_query($connect, $update);

        $_SESSION['idcookie'] = $edit_cpf;

        echo "<script language='javascript' type='text/javascript'>alert('Dados alterados com sucesso!');window.location.href='../perfil/index.php';</script>";
        die();
    }
}

if(isset($_POST['voltar']))
{
    echo "<script>window.location.href='../perfil/index.php';</script>";
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
                <li><a href="../landing_page/index.html">Home</a></li>
                    <li><a href="../cadastro_tutor/index.html">Seja um Voluntário</a></li>
                    <li><a href="../cadastro_user/cadastro.html">Cadastre-se</a></li>
                    <li><a href="../login/login.html">Login</a></li>
                    <li><a href="../info_pages/cuidados.html">Saiba Mais</a></li>
                </ul>
            </div>
            <div class="perfil">
                <div class="username">
                    <?php echo $nome; ?>
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
                <label for="titulo"><b>Edite seus dados</b></label><br><br>
                <form action="#" method="post" enctype="multipart/form-data">
                
                    <div class="caixa">
                        <label for="">Nome: </label>
                        <input class="texto" maxlength="180" name="nome" type="text" placeholder="<?php echo $nome; ?>">
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">CPF: </label>
                        <input class="texto" name="cpf" type="text" placeholder="<?php echo $cpf; ?>" maxlength="14" id="cpf" onkeydown="javascript: fMasc( this, mCPF );">
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">E-mail: </label>
                        <input class="texto" maxlength="255" name="email" type="text" placeholder="<?php echo $email; ?>">
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">Endereço: </label>
                        <input class="texto" maxlength="180" name="endereco" type="text" placeholder="<?php echo $endereco; ?>">
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">Telefone: </label>
                        <input class="texto" name="telefone" id="tel" maxlength="15" type="text" oninput="tMasc()" placeholder="<?php echo $telefone; ?>">
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">Senha: </label>
                        <input class="texto" maxlength="30" name="senha" type="text" placeholder="<?php echo $senha; ?>">
                        <br>
                    </div><br>
                    <div class="caixa">
                        <label for="">Imagem: </label>
                        <input class="foto" type="file" name="foto" id="foto">
                        <br>
                    </div>
                    <input class="botao" type="submit" name="editar" value="Editar"><br><br>
                    <input class="botao" type="submit" name="voltar" value="Voltar">
                </form>
            </div>
        </div>
    </section>
    </div>
    </div>
    <script src="./script.js"></script>
</body>

</html>
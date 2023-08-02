<?php

    header('Content-Type: text/html; charset=utf-8');
    if(isset($_POST['cadastroadopt']))
    {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $raca = $_POST['raca'];
        $porte = $_POST['porte'];
        $ong = $_POST['ong'];
        $pdf = $_FILES['pdf'];

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'projeto_pit';

        if($pdf != NULL) {
            $nomeFinal = time().'.pdf';
            if (move_uploaded_file($pdf['tmp_name'], $nomeFinal)) {
                $tamanhopdf = filesize($nomeFinal);
    
                $mysqlPdf = addslashes(fread(fopen($nomeFinal, "r"), $tamanhopdf));

                unlink($nomeFinal);
            }
        }

        if($mysqlPdf)
        {
            if ($nome == '' or $idade == '' or $raca == '' or $porte == '' or $ong == '' or $mysqlPdf == '')
            {
                echo"<script language='javascript' type='text/javascript'>alert('Você não preencheu todos os campos! Tente novamente!');window.location.href='cadastro.html';</script>";
            }
            {
                $conn = mysqli_connect($host,$user,$pass,$dbname);
    
                $sql = "INSERT INTO adocao values('default','$nome','$raca','$porte','$idade','$ong','$mysqlPdf')";
                mysqli_query($conn,$sql);
    
                echo"<script language='javascript' type='text/javascript'>alert('Pet para adoção cadastrado com sucesso!');window.location.href='../menu/menu.php';</script>";
            }
        }
        else
        {
            echo "<script language='javascript' type='text/javascript'>alert('Histórico veterinário não foi inserido!');window.location.href='cadastro.html';</script>";
        }
    }
?>
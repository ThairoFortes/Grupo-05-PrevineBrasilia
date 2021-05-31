<?php
session_start();
include_once ("conexao.php");

    if((isset($_POST['cpf'])) && (isset($_POST['senha']))){
        $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);//escapar de cararteres especiais
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);//escapar de cararteres especiais
        //$senha = md5($senha);//criptografar

        $sql = "SELECT * FROM Usuarios WHERE cpf = '$cpf' && senha = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);

        if(empty($resultado)){
            $_SESSION['loginErro'] = "<h1 style='color: red;'>CPF ou Senha Inválida!</h1>";
            header("Location: index.php");
        }elseif (isset($resultado)){
            header("Location: menu.php");
        }else{
            $_SESSION['loginErro'] = "<h1 style='color: red;'>CPF ou Senha Inválida!</h1>";
            header("Location: index.php");
        }

    }else{
        $_SESSION['loginErro'] = "<h1 style='color: red;'>CPF ou Senha Inválida!</h1>";
        header("Location: index.php");
    }
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PrevineBSB</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">    
    <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }

          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
         </style>
</head>
<body class="text-center">
    <main class="form-signin">
<div>
    <hgroup>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    </hgroup>
    <form method="post" action="?page=save-statuspaciente">
      <input type="hidden" name="acao" value="cadastrar">
        <img class="mb-4" src="imagens/1.jpeg" alt="" width="300" height="150">
        <h1 class="h3 mb-3 fw-normal">Status do Paciente</h1>

        <div class="form-floating mb-1">
          <input type="number" name="codigostatus_paciente" class= "form-control" id="floatingInput" placeholder="">
          <label for="floatingInput">Código</label>
        </div>

        <div class="form-floating mb-1">
          <input type="text" name="status_paciente" class="form-control" id="floatingPassword" placeholder="">
          <label for="floatingPassword">Status</label>
        </div>

        <?php
        include("config.php");

        switch(@$_REQUEST["page"]){
              //colaborador
          case "save-statuspaciente":
          include("statuspaciente-salvar.php");
          break;
        }
        ?>


        <button class="w-100 btn btn-lg btn-primary" type="submit" value="Entrar">Salvar</button>
        <a href="menu.php">Voltar para Menu</a>
        <p class="mt-5 mb-3 text-muted">&copy; Desenvolvido por Keilly Francielly, Matheus Corrêa e Thairo Fortes :: Todos os Direitos Reservados.</p>
    </form>
    
</div>
</main>
</body>
</html>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PrevineBSB</title>
        <link  href="css/signin.css" rel="stylesheet">    
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
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
        <hgroup>
            <?php
            if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
            }
            ?>
        <hgroup/>
            <form method="post" action="login.php">
            	<img class="mb-4" src="imagens/1.jpeg" alt="" width="300" height="150">
    			   <h1 class="h3 mb-3 fw-normal">Login</h1>

                <div class="form-floating mb-1">
                  <input type="number" name="cpf" class= "form-control" id="floatingInput" placeholder="000.000.000-00">
                  <label for="floatingInput">CPF</label>
                </div>

                <div class="form-floating">
                  <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="**************">
                  <label for="floatingPassword">Senha</label>
                </div>

                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Lembrar
                  </label>
                </div>


                <button class="w-100 btn btn-lg btn-primary" type="submit" value="Entrar">Entrar</button>

                <a href="paciente-cadastrar.php">Preciso Registrar como Paciente</a></br>
                <a href="colaborador-cadastrar.php">Preciso Registrar como Colaborador</a></br>
                <a href="redefinirsenha.php">Esqueci a Senha</a>
                <p class="mt-5 mb-3 text-muted">&copy; Desenvolvido por Keilly Francielly, Matheus Corrêa e Thairo Fortes :: Todos os Direitos Reservados.</p>
            </form>

    </main>
    </body>
</html>
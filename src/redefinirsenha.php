<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
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
                <form method="post" action="redefinirsenha.php">
                    <img class="mb-4" src="imagens/1.jpeg" alt="" width="300" height="150">
                    <h1 class="h3 mb-3 fw-normal">Redefinir Senha</h1>

                    <div class="form-floating mb-1">
                      <input type="number" name="cpf" class= "form-control" id="floatingInput" placeholder="000.000.000-00">
                      <label for="floatingInput">CPF</label>
                    </div>

                    <div class="form-floating mb-2">
                      <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="voce@exemplo.com">
                      <label for="floatingPassword">E-mail</label>
                    </div>
                
                   <button class="w-100 btn btn-lg btn-primary" type="submit" value="Enviar">Entrar</button>
                   <a href="index.php">Voltar para Login</a>
                    <p class="mt-5 mb-3 text-muted">&copy; Desenvolvido por Keilly Francielly, Matheus Corrêa e Thairo Fortes :: Todos os Direitos Reservados.</p>
                </form>
                    
                </div>
        </main>
    </body>

</html>
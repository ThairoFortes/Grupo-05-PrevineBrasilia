<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"/>
  <title>PrevineBSB</title>
  <link href="css/features.css" rel="stylesheet">
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
<body class="container text-center">
  <hgroup>
    <?php
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
  </hgroup>

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="logoff" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
    </symbol>

    <symbol id="toggles2" viewBox="0 0 16 16">
      <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z"/>
      <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z"/>
      <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
    </symbol>

    <symbol id="cadeado" viewBox="0 0 16 16">
      <path d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1zm2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224z"/>
      <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
    </symbol>

    <symbol id="lista" viewBox="0 0 16 16">
      <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
      <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
    </symbol>
  </svg>

  <div px-4 py-5 id="hanging-icons">
    <img src="imagens/1.jpeg" alt="" width="300" height="150">
    <h2 class="pb-2 border-bottom">Menu Principal</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="2em" height="2em"><use xlink:href="#lista"/></svg>
        </div>
        <div>
          <h3>Relatório de Pacientes</h3>
          <p>Imprima relatório dos pacientes cadastrados no sistema.</p></br>
          <input type="hidden" name="acao" value="listar">
          <a href="paciente-relatorio.php" class="btn btn-primary">Gerar</a>
        </div>
      </div>

      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="2em" height="2em"><use xlink:href="#toggles2"/></svg>
        </div>
        <div>
          <h3>Status do Paciente</h3>
          <p>Cadastre status do paciente.</p></br></br>
          <a href="statuspaciente-cadastrar.php" class="btn btn-primary">Editar</a>
        </div>
      </div>

      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="2em" height="2em"><use xlink:href="#cadeado"/></svg>
        </div>
        <div>
          <h3>Alterar Senha</h3>
          <p>Evite senhas fáceis e evite armazenar elas em arquivos de dispositivos que se conectem com a internet.</p><p></p>
          <a href="novasenha.php" class="btn btn-primary">Alterar</a>
        </div>
      </div>

      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="2em" height="2em"><use xlink:href="#lista"/></svg>
        </div>
        <div>
          <h3>Relatório de Colaboradores</h3>
          <p>Imprima relatório dos pacientes cadastrados no sistema.</p></br>
          <input type="hidden" name="acao" value="listar">
          <a href="colaborador-relatorio.php" class="btn btn-primary">Gerar</a>
        </div>
      </div>

      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="2em" height="2em"><use xlink:href="#toggles2"/></svg>
        </div>
        <div>
          <h3>Status do Colaborador</h3>
          <p>Cadastre status do colaborador.</p></br></br>
          <a href="statuscolaborador-cadastrar.php" class="btn btn-primary">Editar</a></p>
        </div>
      </div>

      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="2em" height="2em"><use xlink:href="#logoff"/></svg>
        </div>
        <div>
          <h3>Sair com Segurança</h3>
          <p>Para maior segurança faça o Logoff</p></br>
          <input type="hidden" name="acao" value="listar">
          <a href="index.php" class="btn btn-danger">Sair</a>
        </div>
      </div>

    </div> 
  </div>

<footer>
  <p class="mt-5 mb-3 text-muted">&copy; Desenvolvido por Keilly Francielly, Matheus Corrêa e Thairo Fortes :: Todos os Direitos Reservados.</p>
</footer>
</div>

</body>

</html>
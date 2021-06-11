<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"/>   
  <meta http-equiv="Content-Type" content="text/html"/>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/form-validation.css" rel="stylesheet">
  <title>PrevineBSB</title>
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

<body class="bg-light container">
  <div>
    <header>
      <figure>
        <img src="imagens/1.jpeg" alt="" width="300" height="150">
      </figure>
      <hgroup>
        <div class="px-4 py-5" id="hanging-icons">
          <h2 class="pb-2 border-bottom">Relatório de Colaboradores</h2>
        </div>
      </hgroup>
    </header>

    <div class="container">
      <main>
       <div>

        <div class="row g-3">

          <div class="form-label col-sm-4">
            <label for="floatingInput">Matrícula</label>
            <input type="number" class="form-control" name="matricula" id="matricula" id="floatingInput" placeholder="000 0000" value="">
            <div class="invalid-feedback">Digite um Matricula válido</div>
          </div>

          <div class="form-label col-sm-4">
            <label for="floatingInput">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" id="floatingInput" placeholder="Digito o nome do colaborador" value="">
            <div class="invalid-feedback">Digite um nome válido</div>
          </div>

          <div class="form-label col-sm-4">
            <label for="floatingInput">Status</label>
            <input type="text" class="form-control" name="status" id="status" id="floatingInput" placeholder="Ex: Ativo" value="">
            <div class="invalid-feedback">Digite um status válido</div>
          </div>

          <div class="col-12">
            <input type="submit" class="btn btn-primary"  value="Buscar"/>
          </div>

          <?php
          include("config.php");

          /*$sql = "SELECT * FROM usuarios WHERE cpf='$_REQUEST['cpf']' or nome='$_REQUEST['nome']' or status='$_REQUEST['status']'";*/

          $sql_usuarios = "SELECT u.*,c.*,s.*
          FROM usuarios u JOIN colaborador c
          ON u.id_usuarios = c.usuarios_id_usuarios
          JOIN StatusColaborador s 
          ON c.StatusColaborador_id_statuscolaborador = s.id_statuscolaborador";

          $res_usuarios = $conn -> query($sql_usuarios) or die($conn->error);

          $qtd = $res_usuarios->num_rows;

          if($qtd > 0){
            print "<p>Resultados encontrados: <b>$qtd</b></p>";

            print "<table class='table table-bordered table-striped table-hover'>";
            print "<tr>";
            print "<th>Id</th>";
            print "<th>Matricula</th>";
            print "<th>Nome</th>";
            print "<th>Função</th>";
            print "<th>Cargo</th>";
            print "<th>Área Atuação</th>";
            print "<th>Status</th>";
            print "<th>Registro</th>";
            print "<th>Ações</th>";
            print "</tr>";
            while($row = $res_usuarios->fetch_object()){
              print "<tr>";
              print "<td>".$row->id_usuarios."</td>";
              print "<td>".$row->matricula."</td>";
              print "<td>".$row->nome."</td>";
              print "<td>".$row->funcao."</td>";
              print "<td>".$row->cargo."</td>";
              print "<td>".$row->areaatuacao."</td>";
              print "<td>".$row->statusColaborador."</td>";
              print "<td>".$row->registro."</td>";
              print "<td>
              <button onclick=\"location.href='colaborador-editar.php?id_usuarios=".$row->id_usuarios."';\" class='btn btn-primary'>Editar</button>                
              </td>";
              print "</tr>";
            }
            print "</table>";
          }else{
            print "<p>Não encontrou resultados</p>";
          }

          switch(@$_REQUEST["page"]){
              //colaborador
            case "edit-colaborador":
            include("colaborador-editar.php");
            break;
          }
          ?>

          <a href="menu.php">Voltar para Menu</a> 

        </div>

      </main>
    </div>

  </div>
  <div>
    <footer>
      <p class="mt-5 mb-3 text-muted">&copy; Desenvolvido por Keilly Francielly, Matheus Corrêa e Thairo Fortes :: Todos os Direitos Reservados.</p>
    </footer>
  </div>
</body>
</html>
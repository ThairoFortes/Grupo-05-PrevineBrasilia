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
          <h2 class="pb-2 border-bottom">Dados do Paciente</h2>
        </div>
      </hgroup>
    </header>

    <div class="container">
      <main>
       <div class="col-md-7 col-lg-8">

        <?php
        include("config.php");

        $sql_usuarios = "SELECT u.*,p.*,s.*
        FROM usuarios u JOIN paciente p
        ON u.id_usuarios = p.usuarios_id_usuarios
        JOIN StatusPaciente s 
        ON p.StatusPaciente_id_statuspaciente = s.id_statuspaciente
        WHERE id_usuarios = ".$_REQUEST["id_usuarios"];

        $res_usuarios = $conn -> query($sql_usuarios) or die($conn->error);

        $row = $res_usuarios->fetch_object();

        ?>

        <form class="needs-validation" novalidate method="post" action="paciente-salvar.php">
          <input type="hidden" name="acao" value="editar">
          <input type="hidden" name="id_usuarios" value="<?php echo $row->id_usuarios; ?>">
          <div class="row g-3">

            <div class="col-sm-6">
              <label class="form-label">CPF*</label>
              <input type="text" class="form-control" value="<?php echo $row->cpf; ?>" disabled>
            </div>

            <div class="col-sm-6">
              <label class="form-label">Cartão SUS*</label>
              <input type="number"  class="form-control" value="<?php echo $row->CartaoSUS; ?>" disabled>
            </div>

            <div class="col-12">
              <label class="form-label">Nome Completo*</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" name="nome_paciente" value="<?php echo $row->nome; ?>" disabled>
              </div>
            </div>

            <div class="col-sm-6">
              <label class="form-label">E-mail*</label>
              <input type="email" class="form-control" name="email_paciente" value="<?php echo $row->email; ?>" required>
            </div>

            <div class="col-sm-6">
              <label class="form-label">Data de Nascimento*</label>
              <input type="date" class="form-control" name="dtnascimento_paciente" value="<?php echo $row->DataNascimento; ?>">
            </div>

            <div class="col-sm-6">
              <label class="form-label">Telefone (Opcional)</label>
              <input type="number" class="form-control" name="telefone_paciente" value="<?php echo $row->telefone; ?>">
            </div>

            <div class="col-sm-6">
              <label class="form-label">Celular*</label>
              <input type="number" class="form-control" name="celular_paciente" value="<?php echo $row->celular; ?>">
            </div>

            <div class="col-sm-6">
              <label class="form-label">Gênero*</label>
              <select class="form-select" name="genero_paciente" aria-label="Default select example">
                <option selected><?php echo $row->genero;?></option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
              </select>
            </div>

            <div class="col-sm-6">
              <label class="form-label">Cor*</label>
              <select class="form-select" name="cor_paciente" aria-label="Default select example">
                <option selected><?php echo $row->cor;?></option>
                <option value="Amarelo">Amarelo</option>
                <option value="Branco">Branco</option>
                <option value="Indigena">Indígena</option>
                <option value="Negro">Negro</option>
                <option value="Pardo">Pardo</option>
              </select>
            </div>

            <div class="col-sm-3">
              <label class="form-label">CEP*</label>
              <input type="text"class="form-control" name="cep_paciente" size="10" maxlength="9" id="cep_paciente" value="<?php echo $row->cep; ?>">
            </div>

            <div class="col-sm-3">
              <label class="form-label">Cidade*</label>
              <input type="text" class="form-control" name="cidade_paciente" size="60" id="cidade_paciente" value="<?php echo $row->cidade; ?>">
            </div>

            <div class="col-sm-3">
              <label class="form-label">Bairro*</label>
              <input type="text" class="form-control" name="bairro_paciente" size="40" id="bairro_paciente" value="<?php echo $row->bairro; ?>">
            </div>

            <div class="col-sm-3">
              <label class="form-label">Estado*</label>
              <input type="text" class="form-control" name="uf_paciente" size="2" id="uf_paciente" value="<?php echo $row->estado; ?>">
            </div>

            <div class="col-12">
              <label class="form-label">Endereço*</label>
              <input type="text" class="form-control" name="endereco_paciente" size="40" id="endereco_paciente" value="<?php echo $row->logradouro; ?>">
            </div>

            <div class="col-12">
              <label class="form-label">Complemento (Opcional)</label>
              <input type="text" class="form-control" name="complemento_paciente" size="40" value="<?php echo $row->complemento; ?>">
            </div>

            <div class="col-sm-3">
              <label class="form-label">Dependentes*</label>
              <select class="form-select" name="dependentes_paciente" aria-label="Default select example">
                <option selected><?php echo $row->dependentes;?></option>
                <option value="Sim">Sim</option>
                <option value="Nao">Não</option>
              </select>
            </div>

            <div class="col-sm-2">
              <label class="form-label">Quantidade</label>
              <input type="text" class="form-control" name="qtddependentes_paciente" value="<?php echo $row->QuantDep; ?>">
            </div>

            <div class="col-sm-4">
              <label class="form-label">Agendamento*</label>
              <select class="form-select" name="agendamento_paciente" aria-label="Default select example">
                <option selected><?php echo $row->DiaSemana;?></option>
                <option value="Segunda">Segunda-Feira</option>
                <option value="Terça">Terça-Feira</option>
                <option value="Quarta">Quarta-Feira</option>
                <option value="Quinta">Quinta-Feira</option>
                <option value="Sexta">Sexta-Feira</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
              </select>
            </div>

            <div class="col-sm-3">
              <label class="form-label">Período*</label>
              <select class="form-select" name="periodo_paciente" aria-label="Default select example">
                <option selected><?php echo $row->periodo;?></option>
                <option value="Manha">Manhã</option>
                <option value="Tarde">Tarde</option>
                <option value="Noite">Noite</option>
              </select>
            </div>

            <div class="col-12">
              <input type="submit" class="btn btn-primary"  value="Editar"/>
            </div>
          </form>

          <div class="my-4">
            <a href="index.php">Voltar para Login</a>
          </div>

        </div>
      </main>
    </div>

  </div>

  <?php
  switch(@$_REQUEST["page"]){
      //paciente
    case "cad-paciente":
    include("paciente-cadastrar.php");
    break;
    case "list-paciente":
    include("paciente-listar.php");
    break;
    case "edit-paciente":
    include("paciente-editar.php");
    break;
    case "save-paciente":
    include("paciente-salvar.php");
    break;
  }
  ?>

  <footer>
    <p class="mt-5 mb-3 text-muted">&copy; Desenvolvido por Keilly Francielly, Matheus Corrêa e Thairo Fortes :: Todos os Direitos Reservados.</p>
  </footer>
</body>
</html>
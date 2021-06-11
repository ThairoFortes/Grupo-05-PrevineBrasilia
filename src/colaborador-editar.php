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
  <script>

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco_colaborador').value=("");
            document.getElementById('bairro_colaborador').value=("");
            document.getElementById('cidade_colaborador').value=("");
            document.getElementById('uf_colaborador').value=("");
            //document.getElementById('ibge').value=("");
          }

          function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco_colaborador').value=(conteudo.logradouro);
            document.getElementById('bairro_colaborador').value=(conteudo.bairro);
            document.getElementById('cidade_colaborador').value=(conteudo.localidade);
            document.getElementById('uf_colaborador').value=(conteudo.uf);
            //document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
          }
        }
        
        function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep_colaborador = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep_colaborador != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep_colaborador)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco_colaborador').value="...";
                document.getElementById('bairro_colaborador').value="...";
                document.getElementById('cidade_colaborador').value="...";
                document.getElementById('uf_colaborador').value="...";
                //document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep_colaborador + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
              }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
          }
        };
      </script>
    </head>

    <body class="bg-light container">

      <div>
        <header>
          <figure>
            <img src="imagens/1.jpeg" alt="" width="300" height="150">
          </figure>
          <hgroup>
            <div class="px-4 py-5" id="hanging-icons">
              <h2 class="pb-2 border-bottom">Dados do Colaborador</h2>
            </div>
          </hgroup>
        </header>
        
        <div class="container">
          <main>
           <div class="col-md-7 col-lg-8">

            <?php
            include ("config.php");
            $sql_usuarios = "SELECT u.*,c.*,s.*
            FROM usuarios u JOIN colaborador c
            ON u.id_usuarios = c.usuarios_id_usuarios
            JOIN StatusColaborador s 
            ON c.StatusColaborador_id_statuscolaborador = s.id_statuscolaborador
            WHERE id_usuarios = ".$_REQUEST["id_usuarios"];

            $res_usuarios = $conn -> query($sql_usuarios) or die($conn->error);

            $row = $res_usuarios->fetch_object();

            ?>

            <form class="needs-validation" novalidate method="post" action="?page=save-colaborador">
              <input type="hidden" name="acao" value="editar">
              <input type="hidden" name="id_usuarios" value="<?php echo $row->id_usuarios; ?>">
              <div class="row g-3">

                <div class="col-sm-6">
                  <label class="form-label">CPF*</label>
                  <input type="number" class="form-control"  size="13"maxlength="12" placeholder="000.000.000-00" value="<?php echo $row->cpf; ?>" disabled>
                  <div class="invalid-feedback">Digite um CPF válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Matrícula*</label>
                  <input type="number" class="form-control"  placeholder="000 0000" value="<?php echo $row->matricula; ?>" disabled>
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Nome Completo*</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" name="nome" placeholder="" value="<?php echo $row->nome; ?>" required>
                    <div class="invalid-feedback">Digite um nome válido</div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">E-mail*</label>
                  <input type="text" class="form-control" name="email" placeholder="voce@exemplo.com" value="<?php echo $row->email; ?>" required>
                  <div class="invalid-feedback">Digite um e-mail válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Data de Nascimento*</label>
                  <input type="date" class="form-control" name="DataNascimento" placeholder="" value="<?php echo $row->DataNascimento; ?>" required>
                  <div class="invalid-feedback">Digite uma data válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Telefone (Opcional)</label>
                  <input type="number" class="form-control" name="telefone" placeholder="(DDD) 0000-0000" value="<?php echo $row->telefone; ?>">
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Celular*</label>
                  <input type="number" class="form-control" name="celular" placeholder="(DDD) 00000-0000" value="<?php echo $row->celular; ?>" required>
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">CEP*</label>
                  <input type="text"class="form-control" name="cep" size="10" maxlength="9" id="cep_colaborador" placeholder="00.000-000" value="<?php echo $row->cep; ?>" required onblur="pesquisacep(this.value);">
                  <div class="invalid-feedback">Digite um CEP válido</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Cidade*</label>
                  <input type="text" class="form-control" name="cidade" size="60" id="cidade_colaborador" placeholder="" value="<?php echo $row->cidade; ?>" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Bairro*</label>
                  <input type="text" class="form-control" name="bairro" size="40" id="bairro_colaborador" placeholder="" value="<?php echo $row->bairro; ?>" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Estado*</label>
                  <input type="text" class="form-control" name="estado" size="2" id="uf_colaborador" placeholder="" value="<?php echo $row->estado; ?>" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Endereço*</label>
                  <input type="text" class="form-control" name="logradouro" size="40" id="endereco_colaborador" placeholder="" value="<?php echo $row->logradouro; ?>" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Complemento (Opcional)</label>
                  <input type="text" class="form-control" name="complemento" size="40" placeholder="" value="<?php echo $row->complemento; ?>">
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Função</label>
                  <input type="text" class="form-control" name="funcao" placeholder="" value="<?php echo $row->funcao; ?>">
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Cargo*</label>
                  <input type="text" class="form-control" name="cargo" required placeholder="" value="<?php echo $row->cargo; ?>" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Área de Atuação*</label>
                  <input type="text" class="form-control" name="areaatuacao" required placeholder="" value="<?php echo $row->areaatuacao; ?>" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Status*</label>
                  <select class="form-select" name="StatusColaborador_id_statuscolaborador" aria-label="Default select example" required>
                    <option selected><?php echo $row->StatusColaborador_id_statuscolaborador;?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                <div class="col-12">
                  <input type="submit" class="btn btn-primary"  value="Editar"/>
                </div>
              </form>
              
              <div class="my-4">
                <a href="menu.php">Voltar para Menu</a>
              </div>

            </div>
          </main>
        </div>

      </div>

      <?php
      switch(@$_REQUEST["page"]){
      //colaborador
      case "cad-colaborador":
      include("colaborador-cadastrar.php");
      break;
      case "list-colaborador":
      include("colaborador-listar.php");
      break;
      case "edit-colaborador":
      include("colaborador-editar.php");
      break;
      case "save-colaborador":
      include("colaborador-salvar.php");
      break;
    }
    ?>

    <footer>
      <p class="mt-5 mb-3 text-muted">&copy; Desenvolvido por Keilly Francielly, Matheus Corrêa e Thairo Fortes :: Todos os Direitos Reservados.</p>
    </footer>
  </body>
  </html>
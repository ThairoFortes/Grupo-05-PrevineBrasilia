<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"/>
  <title>PrevineBSB</title>
  <meta http-equiv="Content-Type" content="text/html"/>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/form-validation.css" rel="stylesheet">
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
          <figure class="logosus">
            <img src="imagens/1.jpeg" alt="" width="300" height="150">
          </figure>
          <hgroup>

            <div class="container px-4 py-5" id="hanging-icons">
              <h2 class="pb-2 border-bottom">Dados do Colaborador</h2>
            </div>
          </hgroup>
        </header>

        <div>
          <main>
           <div class="col-md-7 col-lg-8">

            <form class="needs-validation" novalidate method="post" action="?page=save-colaborador">
              <input type="hidden" name="acao" value="cadastrar">
              <div class="row g-3">

                <div class="col-sm-6">
                  <label class="form-label">CPF*</label>
                  <input type="number" class="form-control" name="cpf_colaborador" size="13"maxlength="12" placeholder="000.000.000-00" required>
                  <div class="invalid-feedback">Digite um CPF válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Matrícula*</label>
                  <input type="number" class="form-control" name="matricula_colaborador" placeholder="000 0000" required>
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Nome Completo*</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" name="nome_colaborador" placeholder="" required>
                    <div class="invalid-feedback">Digite um nome válido</div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">E-mail*</label>
                  <input type="text" class="form-control" name="email_colaborador" placeholder="voce@exemplo.com" required>
                  <div class="invalid-feedback">Digite um e-mail válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Data de Nascimento*</label>
                  <input type="date" class="form-control" name="dtnascimento_colaborador" placeholder="" required>
                  <div class="invalid-feedback">Digite uma data válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Telefone (Opcional)</label>
                  <input type="number" class="form-control" name="telefone_colaborador" placeholder="(DDD) 0000-0000">
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Celular*</label>
                  <input type="number" class="form-control" name="celular_colaborador" placeholder="(DDD) 00000-0000" required>
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">CEP*</label>
                  <input type="text"class="form-control" name="cep_colaborador" size="10" maxlength="9" id="cep_colaborador" placeholder="00.000-000" required onblur="pesquisacep(this.value);">
                  <div class="invalid-feedback">Digite um CEP válido</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Cidade*</label>
                  <input type="text" class="form-control" name="cidade_colaborador" size="60" id="cidade_colaborador" placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Bairro*</label>
                  <input type="text" class="form-control" name="bairro_colaborador" size="40" id="bairro_colaborador" placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Estado*</label>
                  <input type="text" class="form-control" name="uf_colaborador" size="2" id="uf_colaborador" placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Endereço*</label>
                  <input type="text" class="form-control" name="endereco_colaborador" size="40" id="endereco_colaborador" placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Complemento (Opcional)</label>
                  <input type="text" class="form-control" name="complemento_colaborador" size="40" placeholder="">
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Função</label>
                  <input type="text" class="form-control" name="funcao_colaborador" placeholder="">
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Cargo*</label>
                  <input type="text" class="form-control" name="cargo_colaborador" required placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Área de Atuação*</label>
                  <input type="text" class="form-control" name="atuacao_colaborador" required placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Senha*</label>
                  <input type="password" class="form-control" name="senha_colaborador" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-12">
                </br> <input type="submit" class="btn btn-primary"  value="Salvar"/>
              </div>
            </div>
          </form>

          <a href="index.php">Voltar para Login</a></br>
          <a href="menu.php">Voltar para Menu</a>
        </div>
      </main>
    </div>

    <?php
      include("config.php");

      switch(@$_REQUEST["page"]){
              //colaborador
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
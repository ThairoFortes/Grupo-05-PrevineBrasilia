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
  <!-- Adicionando Javascript -->
  <script>

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco_paciente').value=("");
            document.getElementById('bairro_paciente').value=("");
            document.getElementById('cidade_paciente').value=("");
            document.getElementById('uf_paciente').value=("");
            //document.getElementById('ibge').value=("");
          }

          function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco_paciente').value=(conteudo.logradouro);
            document.getElementById('bairro_paciente').value=(conteudo.bairro);
            document.getElementById('cidade_paciente').value=(conteudo.localidade);
            document.getElementById('uf_paciente').value=(conteudo.uf);
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
        var cep_paciente = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep_paciente != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep_paciente)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco_paciente').value="...";
                document.getElementById('bairro_paciente').value="...";
                document.getElementById('cidade_paciente').value="...";
                document.getElementById('uf_paciente').value="...";
                //document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep_paciente + '/json/?callback=meu_callback';

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
              <h2 class="pb-2 border-bottom">Dados do Paciente</h2>
            </div>
          </hgroup>
        </header>
        
        <div class="container">
          <main>
           <div class="col-md-7 col-lg-8">

            <form class="needs-validation" novalidate method="post" action="?page=save-paciente">
              <input type="hidden" name="acao" value="cadastrar">
              <div class="row g-3">

                <div class="col-sm-6">
                  <label class="form-label">CPF*</label>
                  <input type="text" class="form-control" name="cpf_paciente" placeholder="000.000.000-00" required>
                  <div class="invalid-feedback">Digite um CPF válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Cartão SUS*</label>
                  <input type="number"  class="form-control" name="cartao_paciente" placeholder="000 0000 0000 0000" required>
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Nome Completo*</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" name="nome_paciente" placeholder="" required>
                    <div class="invalid-feedback">Digite um nome válido</div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">E-mail*</label>
                  <input type="email" class="form-control" name="email_paciente" placeholder="voce@exemplo.com" required>
                  <div class="invalid-feedback">Digite um e-mail válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Data de Nascimento*</label>
                  <input type="date" class="form-control" name="dtnascimento_paciente" placeholder="" required>
                  <div class="invalid-feedback">Digite uma data válida</div>
                </div>
                
                <div class="col-sm-6">
                  <label class="form-label">Telefone (Opcional)</label>
                  <input type="number" class="form-control" name="telefone_paciente" placeholder="(DDD) 0000-0000">
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Celular*</label>
                  <input type="number" class="form-control" name="celular_paciente" placeholder="(DDD) 00000-0000" required>
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Gênero*</label>
                  <select class="form-select" name="genero_paciente" aria-label="Default select example" required>
                    <option selected>Selecione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                  </select>
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Cor*</label>
                  <select class="form-select" name="cor_paciente" aria-label="Default select example" required>
                    <option selected>Selecione</option>
                    <option value="Amarelo">Amarelo</option>
                    <option value="Branco">Branco</option>
                    <option value="Indigena">Indígena</option>
                    <option value="Negro">Negro</option>
                    <option value="Pardo">Pardo</option>
                  </select>
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">CEP*</label>
                  <input type="text"class="form-control" name="cep_paciente" size="10" maxlength="9" id="cep_paciente" placeholder="00.000-000" required onblur="pesquisacep(this.value);">
                  <div class="invalid-feedback">Digite um CEP válido</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Cidade*</label>
                  <input type="text" class="form-control" name="cidade_paciente" size="60" id="cidade_paciente" placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Bairro*</label>
                  <input type="text" class="form-control" name="bairro_paciente" size="40" id="bairro_paciente" placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Estado*</label>
                  <input type="text" class="form-control" name="uf_paciente" size="2" id="uf_paciente" placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Endereço*</label>
                  <input type="text" class="form-control" name="endereco_paciente" size="40" id="endereco_paciente" placeholder="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Complemento (Opcional)</label>
                  <input type="text" class="form-control" name="complemento_paciente" size="40" placeholder="">
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Dependentes*</label>
                  <select class="form-select" name="dependentes_paciente" aria-label="Default select example" required>
                    <option selected>Selecione</option>
                    <option value="s">Sim</option>
                    <option value="n">Não</option>
                  </select>
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                <div class="col-sm-2">
                  <label class="form-label">Quantidade</label>
                  <input type="text" class="form-control" name="qtddependentes_paciente" placeholder="">
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                <div class="col-sm-4">
                  <label class="form-label">Agendamento*</label>
                  <select class="form-select" name="agendamento_paciente" aria-label="Default select example" required>
                    <option selected>Dia da Semana</option>
                    <option value="Segunda">Segunda-Feira</option>
                    <option value="Terça">Terça-Feira</option>
                    <option value="Quarta">Quarta-Feira</option>
                    <option value="Quinta">Quinta-Feira</option>
                    <option value="Sexta">Sexta-Feira</option>
                    <option value="Sábado">Sábado</option>
                    <option value="Domingo">Domingo</option>
                  </select>
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Período*</label>
                  <select class="form-select" name="periodo_paciente" aria-label="Default select example" required>
                    <option selected>Período</option>
                    <option value="Manha">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                  </select>
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                <div class="col-12">
                  <label class="form-label">Senha*</label>
                  <input type="password" class="form-control" name="senha_paciente" placeholder="">
                </div>

                <div class="col-12">
                  <input type="submit" class="btn btn-primary"  value="Salvar"/>
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
      include("config.php");

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
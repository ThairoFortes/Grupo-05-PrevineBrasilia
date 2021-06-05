<?php
    include_once ("conexao.php");
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
    <!-- Adicionando Javascript -->
    <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('enderecopac').value=("");
            document.getElementById('bairropac').value=("");
            document.getElementById('cidadepac').value=("");
            document.getElementById('ufpac').value=("");
            //document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('enderecopac').value=(conteudo.logradouro);
            document.getElementById('bairropac').value=(conteudo.bairro);
            document.getElementById('cidadepac').value=(conteudo.localidade);
            document.getElementById('ufpac').value=(conteudo.uf);
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
        var ceppac = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (ceppac != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(ceppac)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('enderecopac').value="...";
                document.getElementById('bairropac').value="...";
                document.getElementById('cidadepac').value="...";
                document.getElementById('ufpac').value="...";
                //document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ ceppac + '/json/?callback=meu_callback';

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
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
    <div class="px-4 py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Dados do Paciente</h2>
    </div>
        </hgroup>
        <header/>
    <div class="container">
    <main>
       <div class="col-md-7 col-lg-8">
        <form method="POST" action="">
            <div class="row g-3">

                <div class="col-sm-6">
                  <label for="floatingInput" class="form-label">CPF</label>
                  <input type="number" class="form-control" disabled="" name="cpf" id="cpf" id="floatingInput" placeholder="000.000.000-00" value="">
                  <div class="invalid-feedback">Digite um CPF válido</div>
                </div>

                <div class="col-sm-6">
                  <label for="cartaosuspac" class="form-label">Cartão SUS*</label>
                  <input type="number" name="cartaosuspac" disabled="" class="form-control" id="cartaosuspac" placeholder="000 0000 0000 0000" value="" required>
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-12">
                  <label for="nomepac" class="form-label">Nome Completo*</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control" disabled="" name="nomepac" id="nomepac" placeholder="" required>
                  <div class="invalid-feedback">Digite um nome válido</div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="emailpac" class="form-label">E-mail*</label>
                  <input type="email" name="emailpac" disabled="" class="form-control" id="emailpac" placeholder="voce@exemplo.com" value="" required>
                  <div class="invalid-feedback">Digite um e-mail válido</div>
                </div>

                <div class="col-sm-6">
                  <label for="dtnascpac" class="form-label">Data de Nascimento*</label>
                  <input type="date" disabled="" name="dtnascpac" class="form-control" id="dtnascpac" placeholder="" value="dtnascpac" disabled="" required>
                  <div class="invalid-feedback">Digite uma data válida</div>
                </div>
                
                <div class="col-sm-6">
                  <label for="telefonepac" class="form-label">Telefone (Opcional)</label>
                  <input type="number" disabled="" name="telefonepac" class="form-control" id="telefonepac" placeholder="(DDD) 0000-0000" value="telefonepac">
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-sm-6">
                  <label for="celularpac" class="form-label">Celular*</label>
                  <input type="number" disabled="" name="celularpac" class="form-control" id="celularpac" placeholder="(DDD) 00000-0000" value="celularpac" required>
                  <div class="invalid-feedback">Digite um número válido</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Gênero*</label>
                    <select class="form-select" disabled="" name="generopac" aria-label="Default select example" required>
                      <option selected>Selecione</option>
                      <option value="Masculino">Masculino</option>
                      <option value="Feminino">Feminino</option>
                    </select>
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                <div class="col-sm-6">
                  <label class="form-label">Cor*</label>
                    <select class="form-select" disabled="" name="cor" aria-label="Default select example" required>
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
                  <label for="ceppac" class="form-label">CEP*</label>
                  <input type="text" disabled="" name="ceppac" class="form-control" size="10" maxlength="9" id="ceppac" placeholder="00.000-000" value="" required onblur="pesquisacep(this.value);">
                  <div class="invalid-feedback">Digite um CEP válido</div>
                </div>

                <div class="col-sm-3">
                  <label for="cidadepac" class="form-label">Cidade*</label>
                  <input type="text" disabled="" name="cidadepac" class="form-control" size="60" id="cidadepac" placeholder="" value="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label for="bairropac" class="form-label">Bairro*</label>
                  <input type="text" disabled="" name="bairropac" class="form-control" size="40" id="bairropac" placeholder="" value="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label for="ufpac" class="form-label">Estado*</label>
                  <input type="text" disabled="" name="ufpac" class="form-control" size="2" id="ufpac" placeholder="" value="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-12">
                  <label for="enderecopac" class="form-label">Endereço*</label>
                  <input type="text" disabled="" name="enderecopac" class="form-control" size="40" id="enderecopac" placeholder="" value="" required>
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-12">
                  <label for="complementopac" class="form-label">Complemento (Opcional)</label>
                  <input type="text" disabled="" name="complementopac" class="form-control" size="40" id="complementopac" placeholder="" value="">
                  <div class="invalid-feedback">Digite uma informação válida</div>
                </div>

                <div class="col-sm-3">
                  <label class="form-label">Dependentes*</label>
                    <select class="form-select" disabled="" name="possuideppac" aria-label="Default select example" required>
                      <option selected>Selecione</option>
                      <option value="s">Sim</option>
                      <option value="n">Não</option>
                    </select>
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                <div class="col-sm-2">
                  <label for="quntdep" class="form-label">Quantidade</label>
                    <input type="text" disabled="" name="quntdep" class="form-control" id="quntdep" placeholder="" value="">
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

                 <div class="col-sm-4">
                  <label class="form-label">Agendamento*</label>
                    <select class="form-select" disabled="" name="diadasemana" aria-label="Default select example" required>
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
                    <select class="form-select" disabled="" name="periodo" aria-label="Default select example" required>
                      <option selected>Período</option>
                      <option value="Manha">Manhã</option>
                      <option value="Tarde">Tarde</option>
                      <option value="Noite">Noite</option>
                    </select>
                  <div class="invalid-feedback">Selecione uma opção válida</div>
                </div>

               <div class="col-12">
                  <label for="status" class="form-label">Status*</label>
                    <input type="text" disabled="" name="status" class="form-control" id="status" placeholder="Ex: Concluído" value="">
                </div>
               
            </div>
        </form>
        <div class="my-4">        
          <a class="my-4" href="index.php">Sair com Segurança</a></div>
        </div>
    </main>
    </div>
        
</div>
<footer>
            <p class="mt-5 mb-3 text-muted">&copy; Desenvolvido por Keilly Francielly, Matheus Corrêa e Thairo Fortes :: Todos os Direitos Reservados.</p>
        </footer>
</body>
</html>
<?php
    session_start();
?>
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
            document.getElementById('enderecoserv').value=("");
            document.getElementById('bairroserv').value=("");
            document.getElementById('cidadeserv').value=("");
            document.getElementById('ufserv').value=("");
            //document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('enderecoserv').value=(conteudo.logradouro);
            document.getElementById('bairroserv').value=(conteudo.bairro);
            document.getElementById('cidadeserv').value=(conteudo.localidade);
            document.getElementById('ufserv').value=(conteudo.uf);
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
        var cepserv = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cepserv != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cepserv)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('enderecoserv').value="...";
                document.getElementById('bairroserv').value="...";
                document.getElementById('cidadeserv').value="...";
                document.getElementById('ufserv').value="...";
                //document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cepserv + '/json/?callback=meu_callback';

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
            <img src="_imagens/1.jpeg" alt="" width="300" height="150">
        </figure>
        <hgroup>
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
    <div class="container px-4 py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Dados do Colaborador</h2>
    </div>
        </hgroup>
    </header>

    <div>
    <main>
       <div class="col-md-7 col-lg-8">

    <form class="needs-validation" novalidate method="post" action="cadcolaborador.php">
        <div class="row g-3">
            <div class="col-sm-6">
              <label for="cpfserv" class="form-label">CPF*</label>
              <input type="number" class="form-control" name="cpfserv" id="cpfserv" required size="13"maxlength="12" placeholder="000.000.000-00" value="cpfserv" required>
              <div class="invalid-feedback">Digite um CPF válido</div>
            </div>

            <div class="col-sm-6">
              <label for="matriculaserv" class="form-label">Matrícula*</label>
              <input type="number" name="matriculaserv" class="form-control" id="matriculaserv" placeholder="000 0000" value="matriculaserv" required>
              <div class="invalid-feedback">Digite um número válido</div>
            </div>

            <div class="col-12">
              <label for="nomeserv" class="form-label">Nome Completo*</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" name="nomeserv" id="nomeserv" placeholder="" required>
              <div class="invalid-feedback">Digite um nome válido</div>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="emailserv" class="form-label">E-mail*</label>
              <input type="text" name="emailserv" class="form-control" id="emailserv" placeholder="voce@exemplo.com" value="" required>
              <div class="invalid-feedback">Digite um e-mail válido</div>
            </div>

            <div class="col-sm-6">
              <label for="dtnascserv" class="form-label">Data de Nascimento*</label>
              <input type="date" name="dtnascserv" class="form-control" id="dtnascserv" placeholder="" value="dtnascserv" required>
              <div class="invalid-feedback">Digite uma data válida</div>
            </div>

            <div class="col-sm-6">
              <label for="telefoneserv" class="form-label">Telefone (Opcional)</label>
              <input type="number" name="telefoneserv" class="form-control" id="telefoneserv" placeholder="(DDD) 0000-0000" value="telefoneserv">
              <div class="invalid-feedback">Digite um número válido</div>
            </div>

            <div class="col-sm-6">
              <label for="celularserv" class="form-label">Celular*</label>
              <input type="number" name="celularserv" class="form-control" id="celularserv" placeholder="(DDD) 00000-0000" value="celularserv" required>
              <div class="invalid-feedback">Digite um número válido</div>
            </div>

            <div class="col-sm-3">
              <label for="cepserv" class="form-label">CEP*</label>
              <input type="text" name="cepserv" class="form-control" size="10" maxlength="9" id="cepserv" placeholder="00.000-000" value="" required onblur="pesquisacep(this.value);">
              <div class="invalid-feedback">Digite um CEP válido</div>
            </div>

             <div class="col-sm-3">
              <label for="cidadeserv" class="form-label">Cidade*</label>
              <input type="text" name="cidadeserv" class="form-control" size="60" id="cidadeserv" placeholder="" required>
              <div class="invalid-feedback">Digite uma informação válida</div>
            </div>

             <div class="col-sm-3">
              <label for="bairroserv" class="form-label">Bairro*</label>
              <input type="text" name="bairroserv" class="form-control" size="40" id="bairroserv" placeholder="" required>
              <div class="invalid-feedback">Digite uma informação válida</div>
            </div>

            <div class="col-sm-3">
              <label for="ufserv" class="form-label">Estado*</label>
              <input type="text" name="ufserv" class="form-control" size="2" id="ufserv" placeholder="" value="" required>
              <div class="invalid-feedback">Digite uma informação válida</div>
            </div>

            <div class="col-12">
              <label for="enderecoserv" class="form-label">Endereço*</label>
              <input type="text" name="enderecoserv" class="form-control" size="40" id="enderecoserv" placeholder="" value="" required>
              <div class="invalid-feedback">Digite uma informação válida</div>
            </div>

            <div class="col-12">
              <label for="complementoserv" class="form-label">Complemento (Opcional)</label>
              <input type="text" name="complementoserv" class="form-control" size="40" id="complementoserv" placeholder="" value="">
              <div class="invalid-feedback">Digite uma informação válida</div>
            </div>
            
            <div class="col-sm-6">
              <label for="funcaoserv" class="form-label">Função</label>
              <input type="text" class="form-control" name="funcaoserv" id="funcaoserv"   placeholder="" >
              <div class="invalid-feedback">Digite uma informação válida</div>
            </div>

            <div class="col-sm-6">
              <label for="cargorserv" class="form-label">Cargo*</label>
              <input type="text" class="form-control" name="cargorserv" id="cargorserv" required placeholder=""  required>
              <div class="invalid-feedback">Digite uma informação válida</div>
            </div>

            <div class="col-sm-6">
              <label for="areaatuaserv" class="form-label">Área de Atuação*</label>
              <input type="text" class="form-control" name="areaatuaserv" id="areaatuaserv" required placeholder="" value="" required>
              <div class="invalid-feedback">Digite uma informação válida</div>
            </div>

            <div class="col-sm-6">
              <label for="senhaserv1" class="form-label">Senha*</label>
              <input type="password" class="form-control" name="senhaserv1" id="senhaserv1" required placeholder="***********" value="" required>
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
<footer>
            <p class="mt-5 mb-3 text-muted">&copy; Desenvolvido por Keilly Francielly, Matheus Corrêa e Thairo Fortes :: Todos os Direitos Reservados.</p>
        </footer>
</body>
</html>
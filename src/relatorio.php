<?php
    include_once "conexao.php"
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
                <img src="_imagens/1.jpeg" alt="" width="300" height="150">
            </figure>
        <hgroup>
    <div class="px-4 py-5" id="hanging-icons">
        <h2 class="pb-2 border-bottom">Dados do Paciente</h2>
    </div>
        </hgroup>
        </header>
        
    <div class="container">
    <main>
       <div>
        <form method="POST" action="">
            <div class="row g-3">

                <div class="form-label col-sm-4">
                  <label for="floatingInput">CPF</label>
                  <input type="number" class="form-control" name="cpf" id="cpf" id="floatingInput" placeholder="000.000.000-00" value="">
                  <div class="invalid-feedback">Digite um CPF válido</div>
                </div>

                <div class="form-label col-sm-4">
                  <label for="floatingInput">Nome</label>
                  <input type="text" class="form-control" name="nome" id="nome" id="floatingInput" placeholder="Digito o nome do paciente" value="">
                  <div class="invalid-feedback">Digite um nome válido</div>
                </div>

                <div class="form-label col-sm-4">
                  <label for="floatingInput">Status</label>
                  <input type="text" class="form-control" name="status" id="status" id="floatingInput" placeholder="Ex: Pendente" value="">
                  <div class="invalid-feedback">Digite um status válido</div>
                </div>
              
                <div class="col-12">
                    <input type="submit" class="btn btn-primary"  value="Buscar"/>
                </div>

                <a href="index.php">Voltar para Login</a>
                <a href="menu.php">Voltar para Menu</a> 
        
                
                <div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">CPF</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cartão</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Celular</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Dependentes</th>
                        <th scope="col">Disponibilidae</th>
                        <th scope="col">Status</th>
                        <th scope="col">Registro</th>
                      </tr>

                      <?php
                        if(isset($_POST['nome'])){
                          $sql = "SELECT u.*,p.*,s.*
                                  FROM usuarios u JOIN paciente p
                                  ON u.id_usuarios = p.usuarios_id_usuarios
                                  JOIN statususuariosus s 
                                  ON p.StatusUsuarioSUS_idUsu = s.idUsu
                                  WHERE nome LIKE '%$_POST[nome]%' AND cpf LIKE '%$_POST[cpf]%' AND StatusUsuario LIKE '%$_POST[status]%'";

                          $exec = mysqli_query($conn,$sql);
                          if($exec){
                              while($dados = mysqli_fetch_assoc($exec)){
                                  $cpf = $dados['cpf'];
                                  $nome = $dados['nome'];
                                  $datanascimento = $dados['DataNascimento'];
                                  $statususauario = $dados['StatusUsuario'];
                                  $celular = $dados['celular'];
                                  $email = $dados['email'];
                                  $bairro = $dados['bairro'];
                                  $cartaosus = $dados['CartaoSUS'];
                                  $quantdep = $dados['QuantDep'];
                                  $diasemana = $dados['DiaSemana'];
                                  $periodo = $dados['periodo'];
                                  $data_registro = $dados['data_registro'];

                                
                                echo
                                "<tbody>
                                  <tr>
                                   <td>$cpf</td>
                                   <td>$nome</td>
                                   <td>$cartaosus</td>
                                   <td>$datanascimento</td>
                                   <td>$celular</td>
                                   <td>$email</td>
                                   <td>$bairro</td>
                                   <td>$quantdep</td>
                                   <td>$diasemana / $periodo</td>                           
                                   <td>$statususauario</td>
                                   <td>$data_registro
                                   </tr>
                                  </tbody>";
                            };
                        }
                    }

                    else{
                        $sql = "SELECT u.*,p.*,s.*
                                FROM usuarios u JOIN paciente p
                                ON u.id_usuarios = p.usuarios_id_usuarios
                                JOIN statususuariosus s 
                                ON p.StatusUsuarioSUS_idUsu = s.idUsu";

                        $exec = mysqli_query($conn,$sql);
                        if($exec){
                            while($dados = mysqli_fetch_assoc($exec)){
                                $cpf = $dados['cpf'];
                                $nome = $dados['nome'];
                                $datanascimento = $dados['DataNascimento'];
                                $statususauario = $dados['StatusUsuario'];
                                $celular = $dados['celular'];
                                $email = $dados['email'];
                                $bairro = $dados['bairro'];
                                $cartaosus = $dados['CartaoSUS'];
                                $quantdep = $dados['QuantDep'];
                                $diasemana = $dados['DiaSemana'];
                                $periodo = $dados['periodo'];
                                $data_registro = $dados['data_registro'];

                                echo
                                "<tbody>
                                  <tr>
                                   <td>$cpf</td>
                                   <td>$nome</td>
                                   <td>$cartaosus</td>
                                   <td>$datanascimento</td>
                                   <td>$celular</td>
                                   <td>$email</td>
                                   <td>$bairro</td>
                                   <td>$quantdep</td>
                                   <td>$diasemana / $periodo</td>                           
                                   <td>$statususauario</td>
                                   <td>$data_registro
                                   </tr>
                                  </tbody>";
                            };
                        }
                    }
                    
                    die();
                  ?>


                    </thead>
                  </table>
                  
        
                </div> 
            </div>


        </form>
         
        
        
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
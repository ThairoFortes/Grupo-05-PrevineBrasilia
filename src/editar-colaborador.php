<?php
session_start();
include_once("conexao.php");
$cpfserv = filter_input(INPUT_POST, 'cpfserv', FILTER_SANITIZE_STRING);
$result_editarcolaborador =
    "select p.*, c.*, s.*
from pessoas p join colaborador c
on p.cpf = c.pessoas_cpf
join statuscolaborador s 
on c.StatusColaborador_idCol = s.idCol
WHERE cpf= '$cpfserv';";
$resultado_editarcolaborador = mysqli_query($conn, $result_editarcolaborador);
$row_editarcolaborador = mysqli_fetch_assoc($resultado_editarcolaborador);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>EDITAR COLABORADOR-PrevineBSB</title>
    <link rel="stylesheet" type="text/css" href="_css/estilo.css"/>
    <?php
    $a=@$_POST['cor'];
    $b="#ffffff";
    $c=@$_POST['tamanho'];
    $d="15px";
    ?>
    <style>
        div#interface{
            font-size:        <?php switch ($c){case "": echo $d;break;default: echo $c;
                break;}?>;
            background-color: <?php switch ($a){case "": echo $b;break;default: echo $a;
                break;}?>;}
    </style>
</head>
<body>
<div id="interface">

    <form method="post" action="editar-colaborador.php">
        Cor do Fundo <input type="color" name="cor" value="<?php echo $b ;?>"/></br>
        Tamanho da Fonte <input type="text" name="tamanho" value="<?php echo $d ;?>"/>
        <input type="submit" value="Formatar"/>
    </form>

    <header id="cabecalho">
        <figure class="logosus">
            <img src="_imagens/sus.png">
        </figure>
        <hgroup>
            <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <h1>Previne Brasília</h1>
            <h2>Editar Colaborador</h2>
            <h3 style= "color: darkblue">Para a alteração efetiva dos dados, preencha todos campos correntamente!</h3>
        </hgroup>
    </header>

    <form method="post" action="proc-editar-colaborador.php">
        CPF <input type="number" name="cpfserv" value="<?php echo $row_editarcolaborador ['cpf'];?>" required/></br>
        NOME COMPLETO <input type="text" name="nomeserv" value="<?php echo $row_editarcolaborador ['nome'];?>" required/></br>
        DATA DE NASCIMENTO <input type="date" name="dtnascserv" value="<?php echo $row_editarcolaborador ['DataNascimento'];?>" required/></br>
        E-MAIL <input type="text" name="emailserv" value="<?php echo $row_editarcolaborador ['email'];?>" required/></br>
        CEP <input type="number" name="cepserv" value="<?php echo $row_editarcolaborador ['cep'];?>" required/></br>
        ENDEREÇO <input type="text" name="enderecoserv" value="<?php echo $row_editarcolaborador ['logradouro'];?>" required/></br>
        COMPLEMENTO <input type="text" name="complementoserv" value="<?php echo $row_editarcolaborador ['complemento'];?>" /></br>
        BAIRRO <input type="text" name="bairroserv" value="<?php echo $row_editarcolaborador ['bairro'];?>" required/></br>
        CIDADE <input type="text" name="cidadeserv" value="<?php echo $row_editarcolaborador ['cidade'];?>" required/></br>
        ESTADO (UF) <input type="text" name="ufserv" value="<?php echo $row_editarcolaborador ['estado'];?>" required/></br>
        TELEFONE <input type="number" name="telefoneserv" value="<?php echo $row_editarcolaborador ['telefone'];?>" /></br>
        CELULAR <input type="number" name="celularserv" value="<?php echo $row_editarcolaborador ['celular'];?>" required/></br>
        MATRÍCULA <input type="number" name="matriculaserv" value="<?php echo $row_editarcolaborador ['matricula'];?>" required/></br>
        FUNÇÃO <input type="text" name="funcaoserv" value="<?php echo $row_editarcolaborador ['funcao'];?>" /></br>
        CARGO <input type="text" name="cargorserv" value="<?php echo $row_editarcolaborador ['cargo'];?>" required/></br>
        ÁREA DE ATUAÇÃO <input type="text" name="areaatuaserv" value="<?php echo $row_editarcolaborador ['areaatuacao'];?>" required/></br>
        SENHA <input type="password" name="senhaserv1" value="<?php echo $row_editarcolaborador ['senha'];?>" required/></br>
        STATUS <input type="number" name="statususu" value="<?php echo $row_editarcolaborador ['StatusColaborador_idCol'];?>" /></br>
        </br><input type="submit" value="Alterar"/></br></br>
        <a href="index.php">Voltar para Login</a></br></br>
        <a href="menu.php">Voltar para Menu</a>
</div>
</body>
</html>

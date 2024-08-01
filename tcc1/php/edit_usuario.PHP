<?php
session_start();
include_once("conexao.php");
$cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM cliente WHERE cpf = '$cpf'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href=".\imagens\icons/icon.ico"/>
    <meta charset="utf-8">
    <title> Editar Cadastro </title>
    <link rel="stylesheet" type="text/css" href="../css/cadastro.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<!-- Cabeçalho-->
        
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000">
<a class="navbar-brand" href="../index.php">HyperSports</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item">
        <a class="nav-link" href="../carros.php"><img src="../imagens/icons/car.png" align="center">&nbsp;&nbsp;&nbsp;Carros a Venda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../form.php"><img src="../imagens/icons/cadastro.png"align="center">&nbsp;&nbsp;&nbsp;Cadastro <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../topcars.php"><img src="../imagens/icons/topcar.png"align="center">&nbsp;&nbsp;&nbsp;&nbsp;TOP Carros <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="../login.php"><img src="../imagens/icons/login.png" align="center">&nbsp;&nbsp;Logar <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="logout.php"><img src="../imagens/icons/deslogar.png"align="center">Deslogar <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
        <!--CADASTRO-->
<form method="POST" action="proc_edit_usuario.php">
<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
/* Se existe essa variável global chamada msg, então
irá exibir uma msg e logo após isso irá destruir a msg*/		
    }
    
    ?>
    
      <input type="hidden"  id="cpf" name="cpf"  value="<?php echo $row_usuario['cpf']; ?>"> 
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="Pessoais">Informações Pessoais: </label>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="nome">Nome: </label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome:" value="<?php echo $row_usuario['nome']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="sobrenome">Sobrenome:</label>
      <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite aqui seu sobrenome:" value="<?php echo $row_usuario['sobrenome']; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="rg">RG: (Somente Números*)</label>
      <input type="number" class="form-control" id="rg" name="rg" placeholder="Digite seu RG:" value="<?php echo $row_usuario['rg']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="cpf">CPF: (Somente Números*)</label>
      <input type="text" class="form-control" maxlenght="11" id="cpf" name="cpf" placeholder="Digite aqui seu CPF:" value="<?php echo $row_usuario['cpf']; ?>">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-3">
    <label for="data_nasc">Data de Nascimento:</label>
    <input type="date" class="form-control" id="data_nasc" name="data_nasc" placeholder="Data de Nascimento" value="<?php echo $row_usuario['data_nasc']; ?>">
  </div>
  <div class="form-group col-md-3">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" id="telefone" placeholder="Telefone ou Celular:"name="telefone" value="<?php echo $row_usuario['telefone']; ?>">
  </div>
    <div class="form-group col-md-3">
      <label for="email">E-MAIL:</label>
      <input type="email" class="form-control" id="email" placeholder="Digite seu E-mail:" name="email"value="<?php echo $row_usuario['email']; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="senha">Senha:</label>
      <input type="password" class="form-control" id="senha" placeholder="Senha para cadastro:" name="senha" value="<?php echo $row_usuario['senha']; ?>">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Pessoais">Informações Locais: </label>
    </div>
  </div>
    <div class="form-row">
  <div class="form-group col-md-2">
    <label for="cep">CEP: (Somente Números*)</label>
    <input type="number" class="form-control" id="cep" placeholder="85801-002" name="cep" value="<?php echo $row_usuario['cep']; ?>">
  </div>
  <div class="form-group col-md-4">
    <label for="rua">Rua:</label>
    <input type="text" class="form-control" id="rua" placeholder="Av. Brasil:" name="rua" value="<?php echo $row_usuario['rua']; ?>">
  </div>
    <div class="form-group col-md-2">
      <label for="numero_local">Número Residêncial:</label>
      <input type="number" class="form-control" id="numero_local" placeholder="7825" name="numero_local" value="<?php echo $row_usuario['numero_local']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="complemtento">Complemento:</label>
      <input type="text" class="form-control" id="complemento" placeholder="Casa/Apartamento/Sala Comercial" name="complemento" value="<?php echo $row_usuario['complemento']; ?>">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="bairro">Bairro:</label>
      <input type="text" class="form-control" id="bairro" placeholder="Centro" name="bairro" value="<?php echo $row_usuario['bairro']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="cidade">Cidade:</label>
      <input type="text" class="form-control" id="cidade" placeholder="Cascavel"name="cidade" value="<?php echo $row_usuario['cidade']; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="estado">Estado:</label>
      <input type="text" class="form-control" id="estado" placeholder="Paraná"name="estado" value="<?php echo $row_usuario['estado']; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="pais">País:</label>
      <input type="text" class="form-control" id="pais" placeholder="Brasil" name="pais" value="<?php echo $row_usuario['pais']; ?>">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
    <button type="submit" class="btn btn-dark">editar</button>
    </div>
  </div>
    </form>
</body>
</html>
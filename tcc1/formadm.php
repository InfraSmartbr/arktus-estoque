<?php
session_start();
include("php/conexao.php");
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="imagens\icons/icon.ico"/>
    <meta charset="utf-8">
    <title> Cadastro do Administrador </title>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<!-- Cabeçalho-->
        
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000">
<a class="navbar-brand" href="index.php">HyperSports</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item">
        <a class="nav-link" href="carros.php"><img src="imagens/icons/car.png" align="center">&nbsp;&nbsp;&nbsp;Carros a Venda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="form.php"><img src="imagens/icons/cadastro.png"align="center">&nbsp;&nbsp;&nbsp;Cadastro <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="topcars.php"><img src="imagens/icons/topcar.png"align="center">&nbsp;&nbsp;&nbsp;&nbsp;TOP Carros <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="login.php"><img src="imagens/icons/login.png" align="center">&nbsp;&nbsp;Logar <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="php/logout.php"><img src="imagens/icons/deslogar.png"align="center">Deslogar <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
        <!--CADASTRO-->
<form method="POST" action="php/cadastroadm.php">
<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
/* Se existe essa variável global chamada msg, então
irá exibir uma msg e logo após isso irá destruir a msg*/		
    }
    
    ?>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="Pessoais">Informações Pessoais: </label>
      <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
/* Se existe essa variável global chamada msg, então
irá exibir uma msg e logo após isso irá destruir a msg*/		
    }
    
    ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="cpf">CPF: </label>
      <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o seu cpf:" required>
    </div>
    <div class="form-group col-md-2">
    <label for="rg">RG:</label>
    <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite o seu rg:" required>
    </div>
    <div class="form-group col-md-3">
      <label for="nome">NOME:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite aqui seu nome:"required>
    </div>
    <div class="form-group col-md-3">
      <label for="sobrenome">SOBRENOME:</label>
      <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Digite aqui seu sobrenome:"required>
    </div>
    <div class="form-group col-md-3">
      <label for="email">EMAIL:</label>
      <input type="text" class="form-control" maxlenght="11" id="email" name="email" placeholder="Digite o seu email:" required>
    </div>
    <div class="form-group col-md-2">
      <label for="data_nasc">DATA DE NASCIMENTO</label>
      <input type="date" class="form-control" maxlenght="11" id="data_nasc" name="data_nasc"  required>
    </div>
    <div class="form-group col-md-3">
      <label for="telefone">TELEFONE:</label>
      <input type="text" class="form-control" maxlenght="11" id="telefone" name="telefone" placeholder="Digite o seu telefone:" required>
    </div>
    <div class="form-group col-md-3">
      <label for="senha">DIGITE UMA SENHA</label>
      <input type="text" class="form-control" maxlenght="11" id="senha" name="senha" placeholder="Digite uma senha:" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Pessoais">Informações Locais: </label>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-3">
    <label for="cep">CEP</label>
    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP:" required>
  </div>
  <div class="form-group col-md-3">
    <label for="rua">RUA:</label>
    <input type="text" class="form-control" id="rua" placeholder="Rua:" name="rua" required>
  </div>
    <div class="form-group col-md-3">
      <label for="bairro">BAIRRO:</label>
      <input type="bairro" class="form-control" id="bairro" placeholder="Digite seu Bairro:" name="bairro" required>
    </div>
    <div class="form-group col-md-2">
      <label for="numero_local">NUMERO LOCAL:</label>
      <input type="text" class="form-control" id="numero_local" placeholder="Número:" name="numero_local" required>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="complemento">COMPLEMENTO:</label>
      <input type="text" class="form-control" id="complemento" placeholder="Complemento:" name="complemento">
    </div>
    <div class="form-group col-md-3">
      <label for="cidade">CIDADE</label>
      <input type="text" class="form-control" id="cidade" placeholder="CIDADE:" name="cidade" required>
    </div>
    <div class="form-group col-md-3">
      <label for="estado">ESTADO</label>
      <input type="text" class="form-control" id="estado" placeholder="ESTADO:" name="estado" required>
    </div>
    <div class="form-group col-md-2">
      <label for="pais">PAÍS:</label>
      <input type="text" class="form-control" id="pais" placeholder="País:" name="pais" required>
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
    <button type="submit" class="btn btn-dark">CADASTRAR</button>
    </div>
  </div>
    </form>
</body>
</html>
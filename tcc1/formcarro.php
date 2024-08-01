<?php
session_start();
include_once("php/conexao.php");
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href=".\imagens\icons/icon.ico"/>
    <meta charset="utf-8">
    <title> Cadastro </title>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css"/>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
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
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item">
        <a class="nav-link" href="index.php"><img src="./imagens/icons/home.png" align="center">&nbsp;&nbsp;&nbsp; HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="form.php"><img src="./imagens/icons/cadastro.png"align="center">&nbsp;&nbsp;&nbsp;Cadastro <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="topcars.php"><img src="./imagens/icons/topcar.png"align="center">&nbsp;&nbsp;&nbsp;&nbsp;TOP Carros <span class="sr-only">(current)</span></a>
      </li>
&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="login.php"><img src="./imagens/icons/login.png" align="center">Logar <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="php/logout.php"><img src="./imagens/icons/deslogar.png"align="center">Deslogar <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
        <!--CADASTRO-->
<form method="POST" action="php/cadastrocarro.php" enctype="multipart/form-data">
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
      <label for="Pessoais"> Carro : </label>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="nome">Nome: </label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Carro:">
    </div>
    <div class="form-group col-md-3">
      <label for="chassi">Chassi:</label>
      <input type="text" class="form-control" id="chassi" name="chassi" placeholder="Digite o Chassi do Carro:">
    </div>
    <div class="form-group col-md-2">
      <label for="cor">Cor</label>
      <input type="text" class="form-control" id="cor" name="cor" placeholder="Digite a Cor:">
    </div>
    <div class="form-group col-md-3">
      <label for="ano">Ano:</label>
      <input type="text" class="form-control" maxlenght="11" id="ano" name="ano" placeholder="Ano:">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-3">
    <label for="modelo">Modelo:</label>
    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo:">
  </div>
  <div class="form-group col-md-3">
    <label for="categoria">Categoria:</label>
    <input type="text" class="form-control" id="categoria" placeholder="Categoria:"name="categoria">
  </div>
  <!-- Arquivo Marca BD -->
  <div class="form-group col-md-2">
    <label for="idmarca">Marca:</label>
    <select class="form-control" id="idmarca" name="idmarca"required>
      <option aria-disabled="">Selecione:</option>
      <?PHP 
      	$result_mensagem = "SELECT * FROM marca";
        $resultado_mensagem= mysqli_query($conn, $result_mensagem);
      while($row_mensagem = mysqli_fetch_assoc($resultado_mensagem)){ 
       echo "<option id='idmarca' value=".$row_mensagem['idmarca'].">". $row_mensagem['descricao']."</option>";
       } ?>
    </select>
  </div>
     
  <!-- Fim da pesquisa BD -->
    <div class="form-group col-md-3">
      <label for="quantidade">Quantidade:</label>
      <input type="text" class="form-control" id="quantidade" placeholder="Quantidade" name="quantidade">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="km">Km:</label>
      <input type="text" class="form-control" id="km" placeholder="Informe a Kilometragem:" name="km">
    </div>
    <div class="form-group col-md-4">
      <label for="cambio">Câmbio:</label>
      <input type="text" class="form-control" id="cambio" placeholder="Manual ou Automático:" name="cambio">
    </div>
    <div class="form-group col-md-4">
      <label for="preco"> Valor :</label>
      <input type="text" class="form-control" id="preco" placeholder="Ex: $1500000:" name="preco">
      </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Caracteristicas">Caractericas: </label>
    </div>
  </div>
    <div class="form-row">
  <div class="form-group col-md-4">
    <label for="caracteristica_1">Caracteristica 1: </label>
    <input type="text" class="form-control" id="caracteristica_1" placeholder="Informe uma das caracteristicas" name="caracteristica_1">
  </div>
  <div class="form-group col-md-4">
    <label for="caracteristica_2">Caracteristica 2: </label>
    <input type="text" class="form-control" id="caracteristica_2" placeholder="Informe uma das caracteristicas" name="caracteristica_2">
  </div>
  <div class="form-group col-md-3">
    <label for="caracteristica_3">Caracteristica 3 (opcional): </label>
    <input type="text" class="form-control" id="caracteristica_3" placeholder="Informe uma das caracteristicas" name="caracteristica_3">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="caracteristica_4">Caracteristica 4 (opcional):</label>
    <input type="text" class="form-control" id="caracteristica_4" placeholder="Informe uma das caracteristicas" name="caracteristica_4">
  </div>
  <div class="form-group col-md-4">
    <label for="caracteristica_5">Caracteristica 5 (opcional):</label>
    <input type="text" class="form-control" id="caracteristica_5" placeholder="Informe uma das caracteristicas" name="caracteristica_5">
  </div>
  <div class="form-group col-md-3">
    <label for="caracteristica_6">Caracteristica 6 (opcional): </label>
    <input type="text" class="form-control" id="caracteristica_6" placeholder="Informe uma das caracteristicas" name="caracteristica_6">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Especificações">Especificações: </label>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-4">
    <label for="combustivel">Combustível:</label>
    <input type="text" class="form-control" id="combustivel" placeholder="ex: Gasolina, Diesel, Etanol, Elétrico:" name="combustivel">
  </div>
    <div class="form-group col-md-2">
      <label for="motor">Motor:</label>
      <input type="text" class="form-control" id="motor" placeholder="ex: Hibrido, V8, V-TEC" name="motor">
    </div>
    <div class="form-group col-md-3">
      <label for="descricao">Descrição:</label>
      <input type="text" class="form-control" id="descricao" placeholder="Ar-condicionado, direção, etc" name="descricao">
    </div>
    <div class="form-group col-md-2">
      <label for="radio">Radio:</label>
      <input type="text" class="form-control" id="radio" placeholder="Ex: MP3,BLUETOOTH" name="radio">
    </div>
      </div>
    <div class="form-row">
    <div class="form-group col-md-3">
      <label for="parte_eletrica">Parte Elétrica:</label>
      <input type="text" class="form-control" id="parte_eletrica" name="parte_eletrica">
    </div>
  <div class="form-group col-md-3">
    <label for="foto1">Fotos Slide 1</label>
  <input type="file" class="form-control-file col-md-6" id="foto" itens="1" name="foto1">
  </div>
  <div class="form-group col-md-3">
    <label for="foto2">Fotos Slide 2</label>
  <input type="file" class="form-control-file col-md-6" id="foto" itens="1" name="foto2">
  </div>
  <div class="form-group col-md-3">
    <label for="foto3">Fotos Slide 3</label>
  <input type="file" class="form-control-file col-md-6" id="foto" itens="1" name="foto3">
  </div>
      </div>
    <div class="form-row">
    <div class="form-group col-md-6">
    <button type="submit" class="btn btn-dark" name="upload">Cadastrar</button>
    </div>
  </div>
</form>
</body>
</html>
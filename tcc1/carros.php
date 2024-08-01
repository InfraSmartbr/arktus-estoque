<?php
include("php/conexao.php");
session_start();
?>
<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="imagens/icons/icon.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8"/>
<title> Carros a Venda </title>
<link rel="stylesheet" type="text/css" href="css/carros.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script src="js/jquery-3.4.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<style>
a.comprar:link, a.comprar:visited {
  background-color: #ce0a0a;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: 'Roboto Condensed', sans-serif;
  border-radius:5px;
}

a.comprar:hover, a.comprar:active {
  -webkit-transition:0.5s; /* For Safari 3.1 to 6.0 */
  transition: 0.5s;
  background-color:green;
}
</style>
</head>
<body>
<!-- CABEÇALHO -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000">

<a class="navbar-brand" href="index.php">HyperSports</a>';


  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item">
        <a class="nav-link" href="carros.php"><img src="imagens/icons/car.png" align="center">&nbsp;&nbsp;&nbsp;Carros a Venda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <img src="./imagens/icons/cadastro.png"align="center">
          Cadastros
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="form.php"><img src="./imagens/icons/pessoal.png"align="center">Cadastro Pessoal</a>
        <a class="dropdown-item" href="formcarro.php"><img src="./imagens/icons/cadastrocarro.png"align="center"> Cadastro Carro</a>
        <a class="dropdown-item" href="fornecedor.php"><img src="./imagens/icons/fornecedor.png"align="center"> Cadastro Fornecedor</a>
        </div>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="topcars.php"><img src="./imagens/icons/topcar.png"align="center">&nbsp;&nbsp;&nbsp;&nbsp;TOP Carros <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
<!-- fim da nav -->
</div>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
<!--parte dos carros-->
<section id="anuncios">
        <!-- -----------------------------------------------------PRIMEIRO CARRO--------------------------------------------------- -->
        <?PHP 
      	$result_mensagem = "SELECT *, marca.descricao from carros inner join marca on marca.idmarca = carros.idmarca";
          $resultado_mensagem= mysqli_query($conn, $result_mensagem);
        while($row_mensagem = mysqli_fetch_assoc($resultado_mensagem)){
         echo   "<div class='container'>";
         echo     "<figure class='foto'>";
         echo     "<img id='p1' src='fotos/".$row_mensagem['foto1']."'>";
         echo   "</figure>";
                echo  "<div class='componente-1'>".$row_mensagem['descricao']."&nbsp;". $row_mensagem['nome']."</div>";
                echo "<div class='componente-2'>"."<img id='l1' src='imagens/logo/".$row_mensagem['logo']."'>"."</div>";
                echo "<div class='componente-3'>".
                "<div class='topo'>".
                    "<div class='dado1'>"."ANO:&nbsp;&nbsp;".$row_mensagem['ano']. "</div>".
                    "<div class='dado1'>" ."CÂMBIO:&nbsp;&nbsp;".$row_mensagem['cambio']."</div>".
                    "<div class='dado1'style='width:100%;'>"."KM:&nbsp;&nbsp;".$row_mensagem['km']."</div>".
                "</div>".
               "<div class='baixo'>".
                    "<div class='dado1'>"."CATEGORIA:&nbsp;&nbsp;&nbsp;".$row_mensagem['categoria']."</div>".
                "</div>".
                "</div>".
                    "<div class='componente-4'>"."</div>".
                    "<div class='componente-5'>"."PREÇO:&nbsp;&nbsp;R$&nbsp;&nbsp;".$row_mensagem['preco']."</div>".
                "<div class='componente-6'>".
                    "<div class='comprar'>"."<a class='comprar'href='detalhes.php?chassi=".$row_mensagem['chassi']."'>"."MAIS DETALHES"."</a>".
                "</div>".
                "</div>".
        "</div>".
        "<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>"."<br>";
    } ?>
</section>
</body>
</html>
<?php
include("php/conexao.php");
session_start();
//* Verificação de Login *//
if((!isset ($_SESSION['cpf']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['cpf']);
  unset($_SESSION['senha']);
}
else if 
((!isset ($_SESSION['cnpj']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['cnpj']);
  unset($_SESSION['senha']);}
$chassi = filter_input(INPUT_GET,'chassi');
?>
<!doctype html>
<html>
  <!-- CABEÇALHO -->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8"/>
<title> Hyper Sports </title>
<link rel="shortcut icon" href=".\imagens\icons/icon.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="./js/bar.js"></script>
<link rel="stylesheet" type="text/css" href="./css/inicial.css"/>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" ></script>
</head>
<!-- fim do cabeçalho -->
<!-- CORPO DA PAGINA -->
<body>
  <!--  BARRA DE NAVEGAÇÃO -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000">
<a class="navbar-brand" href="index.php">HyperSports</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item">
        <a class="nav-link" href="carros.php"><img src="./imagens/icons/car.png" align="center">&nbsp;&nbsp;&nbsp;Carros a Venda <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="topcars.php"><img src="./imagens/icons/topcar.png"align="center">&nbsp;&nbsp;&nbsp;&nbsp;TOP Carros <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <img src="./imagens/icons/cadastro.png"align="center">
          Cadastros
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="form.php"><img src="./imagens/icons/pessoal.png"align="center">Cadastro Pessoal</a>

       <a class="dropdown-item" href="fornecedor.php"><img src="./imagens/icons/fornecedor.png"align="center"> Cadastro Fornecedor</a>
        </div>
      </li>
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <img src="./imagens/icons/listar.png"align="center">
          Listar
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="php/listar.php"><img src="./imagens/icons/listar.png"align="center"> Editar Cadastro </a>
        </div>
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

<!-- ////////////////////////////////////////////// TITULO DOS DADOS ////////////////////////// -->
<br><br>
<br><br>
<?php
    if(isset($_SESSION['msglistar'])){
?><?=$_SESSION['msglistar']?>
<?php }?>
<?php $result_cliente = "SELECT * FROM cliente WHERE cpf = '".$_SESSION['cpf']."'";
$resultado_cliente = mysqli_query($conn, $result_cliente);
$row_cliente = mysqli_fetch_assoc($resultado_cliente);
?>
<div class="card mb-3">
     <div class="card-header">
         <h5 class="display-5" style="font-size:26px;text-align:center;font-style: italic;color:white;"> SEJA BEM VINDO! <br><?php echo $row_cliente['nome']; ?></h5>
     </div><!-- fim .card-header -->
    </div>


<!-- -------------------------------------------------- FOOTER ------------------------------------------------->
    <div class='footer-contato'> 
    <div class='titulo-footer'> ENTRE EM CONTATO </div>
    <div class='componente-1'><img class='footer' src='./imagens/icons/telefone.png' align='center'> (45) 3231-5555 </div>
    <div class='componente-2'><img class='footer' src='./imagens/icons/whatsapp.png' align='center'> 55+(45) 99957-6600 </div>
    <div class='componente-3'><img class='footer' src='./imagens/icons/gmail.png' align='center'> hyperssport@gmail.com </div></div>

</div>
<!-------------------------------------------------- PARCEIROS------------------------------------------------>
<div class='parceiros'>
  <div class='titulo-parceiros'> @A equipe HyperSport deixa claro que todos os creditos das informações e das imagens dos carros são para as empresas parceiras. </div>
    <div class='parceiros-1'><img class='fornecedores' src='./imagens/logo/bug.png' align='center'> </div>
    <div class='parceiros-2'><img class='fornecedores' src='./imagens/logo/lamb.png' align='center'></div>
    <div class='parceiros-3'><img class='fornecedores' src='./imagens/logo/ford.png' align='center'></div>
    <div class='parceiros-4'><img class='fornecedores' src='./imagens/logo/ferrari.png' align='center'></div>
    <div class='parceiros-5'><img class='fornecedores' src='./imagens/logo/koe.png' align='center'></div>
    <div class='parceiros-6'><img class='fornecedores' src='./imagens/logo/henessey.png' align='center'></div>
    <div class='parceiros-8'><img class='fornecedores' src='./imagens/logo/porshe.png' align='center'></div>
    
    
</div>
</div>
<!-- Fim da Nav -->
</body>
<!-- Fim do corpo da pagina -->
</html>
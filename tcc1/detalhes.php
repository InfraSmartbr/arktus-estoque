<?php
include("php/conexao.php");
session_start();
$chassi= filter_input(INPUT_GET,'chassi');
  //* Verificação de Login *//
	if((!isset ($_SESSION['cpf']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);
  }
$pagina_atual = filter_input(INPUT_GET,'pagina');		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 1;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<?PHP 
      	$result_mensagem = "SELECT * FROM carros WHERE chassi = '$chassi' LIMIT $inicio, $qnt_result_pg ";
          $resultado_mensagem= mysqli_query($conn, $result_mensagem);
        while($row_mensagem = mysqli_fetch_assoc($resultado_mensagem)){
echo "<title>".$row_mensagem['nome']."</title>";
        } ?>
<link rel="shortcut icon" href=".\imagens\icons/icon.ico"/>
<link rel="stylesheet" type="text/css" href="css/koen.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/slider.css">
<!-- JavaSCRIPT -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- FIM -->
<link rel="shortcut icon " href="../imagens/icons/icon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<style>
a.detalhes:link, a.detalhes:visited {
  background-color: green;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a.detalhes:hover, a.detalhes:active {
  background-color: green;
}
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000">
<a class="navbar-brand" href="index.php">HyperSports</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item">
        <a class="nav-link" href="./carros.php"><img src="imagens/icons/car.png" align="center">&nbsp;&nbsp;&nbsp;Carros a Venda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <img src="./imagens/icons/cadastro.png"align="center">
          Cadastros
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="./form.php"><img src="./imagens/icons/pessoal.png"align="center">Cadastro Pessoal</a>
        <a class="dropdown-item" href="./formcarro.php"><img src="./imagens/icons/cadastrocarro.png"align="center"> Cadastro Carro</a>
        <a class="dropdown-item" href="./fornecedor.php"><img src="./imagens/icons/fornecedor.png"align="center"> Cadastro Fornecedor</a>
        </div>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="./topcars.php"><img src="./imagens/icons/topcar.png"align="center">&nbsp;&nbsp;&nbsp;&nbsp;TOP Carros <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="./login.php"><img src="./imagens/icons/login.png" align="center">Logar <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="php/logout.php"><img src="./imagens/icons/deslogar.png"align="center">Deslogar <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
/* Se existe essa variável global chamada msg, então
irá exibir uma msg e logo após isso irá destruir a msg*/		
		}
    ?>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>

<!------------------------------------------------------------- parte dos componentes da tabela ---------------------------!-->
<?php
$result_mensagem = "SELECT * FROM carros where chassi = '$chassi' LIMIT $inicio, $qnt_result_pg";
$resultado_mensagem= mysqli_query($conn, $result_mensagem);
while($row_mensagem = mysqli_fetch_assoc($resultado_mensagem)){
echo "<div class='container'>".
    "<div class='componente-1'>" ."&nbsp;".$row_mensagem['nome']."&nbsp;".$row_mensagem['ano']."</div>".
    "<div class='componente-2'> ".
    "<div class='w3-content w3-display-container'>".
    "<img class='mySlides' src='fotos/".$row_mensagem['foto1']."'' style='width:100%'>".
    "<img class='mySlides' src='fotos/".$row_mensagem['foto2']."' style='width:100%'>".
    "<img class='mySlides' src='fotos/".$row_mensagem['foto3']."' style='width:100%'>".
  
      "<button class='w3-button w3-black w3-display-left' onclick='plusDivs(-1)'>&#10094;</button>".
      "<button class='w3-button w3-black w3-display-right' onclick='plusDivs(1)'>&#10095;</button>".
      "</div>".
      "<script>".
"var slideIndex = 1;".
"showDivs(slideIndex);".

"function plusDivs(n) {".
 " showDivs(slideIndex += n);".
"}".
"function showDivs(n) {".
  "var i;".
  "var x = document.getElementsByClassName('mySlides');".
 " if (n > x.length) {slideIndex = 1}".
"  if (n < 1) {slideIndex = x.length}".
  "for (i = 0; i < x.length; i++) {".
    "x[i].style.display = 'none'; " .
 " }".
 " x[slideIndex-1].style.display = 'block';".
"}".
"</script>".
"</div>".
// "<div class='compra'>".
"<div class='topo1'>"."<a class='detalhes' href='pagamento.php?chassi=".$row_mensagem['chassi']."'>"."COMPRAR"."</a>"."</div>".
// "</div>".
"</div>".
"<br>".

"<!-------------------------------------------------------------- segunda tabela -------------------------------------------------------->".
"<div class='container-2'>".
   " <div class='componente-titulo'>"."CARACTERISTICAS"."</div>".
    "<div class='componente-3'>"."<img class='cars' src='./imagens/icons/li.png'>".$row_mensagem['caracteristica_1']. "</div>".
    "<div class='componente-4'>"."<img class='cars' src='./imagens/icons/li.png'>".$row_mensagem['caracteristica_2']."</div>".
    "<div class='componente-5'>"."<img class='cars' src='./imagens/icons/li.png'>" .$row_mensagem['caracteristica_3']. "</div>".
    "<div class='componente-6'>"."<img class='cars' src='./imagens/icons/li.png'>" .$row_mensagem['caracteristica_4']. "</div>".
   "<div class='componente-7'>"."<img class='cars' src='./imagens/icons/li.png'>".$row_mensagem['caracteristica_5']. "</div>".
    "<div class='componente-8'>"."<img class='cars' src='./imagens/icons/li.png'>".$row_mensagem['caracteristica_6']."</div>".
"</div>".
"<br>".

"<!-------------------------------------------------------------- terceira tabela -------------------------------------------------------->".

"<div class='container-3'>".
"<div class='componente-titulo-espe'>". "ESPECIFICAÇÕES"."</div>".
"<div class='componente-9'>"."<img class='especificacoes' src='./imagens/icons/combustivel.png' align='center'>". "-"."&nbsp;" .$row_mensagem['combustivel']."</div>".
"<div class='componente-10'>"."<img class='especificacoes' src='./imagens/icons/pistons.png' align='center'>". "-"."&nbsp;".$row_mensagem['motor']."</div>".
"<div class='componente-11'>"."<img class='especificacoes' src='./imagens/icons/volante.png' align='center'>". "-"."&nbsp;".$row_mensagem['descricao']."</div>".
"<div class='componente-12'>"."<img class='especificacoes' src='./imagens/icons/radio.png' align='center'>". "-"."&nbsp;".$row_mensagem['radio']."</div>".
"<div class='componente-13'>"."<img class='especificacoes' src='./imagens/icons/porta.png' align='center'>". "-"."&nbsp;".$row_mensagem['parte_eletrica']."</div>".
"</div>".
"<br>"."<br>".
"<!--------------------------------------------------------------------footer------------------------------------------------------------------------>".
"<br>"."<br>";
} ?>
<div class='container-footer'>
    <div class='titulo-footer'> EM CASO DE DUVIDAS ENTRE EM CONTATO.</div>
    <div class='componente-15'><img class='footer' src='./imagens/icons/telefone.png' align='center'> (45) 3231-5555  </div>
    <div class='componente-16'><img class='footer' src='./imagens/icons/whatsapp.png' align='center'> 55+(45) 99957-6600 </div>
    <div class='componente-17'><img class='footer' src='./imagens/icons/gmail.png' align='center'> hyperssport@gmail.com </div>
    <div class='titulo-parceiros'> EM PARCERIA COM </div>
    <div class='componente-18'><img class='footer-parceiros' src='./imagens/logo/bug.png' align='center'> </div>
    <div class='componente-19'><img class='footer-parceiros' src='./imagens/logo/koe.png'> </div>
    <div class='componente-20'><img class='footer-parceiros' src='./imagens/logo/nissan.png'></div>
    <div class='componente-21'><img class='footer-parceiros' src='./imagens/logo/porshe.png'> </div>
    <div class='componente-22'><img class='footer-parceiros' src='./imagens/logo/lamb.png'> </div>
    <div class='componente-23'><img class='footer-parceiros' src='./imagens/logo/ferrari.png'> </div>
    <div class='componente-24'><img class='footer-parceiros' src='./imagens/logo/mc.png'> </div>
    <div class='componente-25'><img class='footer-parceiros-3' src='./imagens/logo/ford.png'> </div>
    <div class='componente-26'><img class='footer-parceiros-3' src='./imagens/logo/henessey.png'> </div>
    <div class='direitos'><img class='direitos-imagem' src='./imagens/icons/direitos.png'> A equipe HyperSport deixa claro que todos os creditos das informações e das imagens dos carros são para as empresas parceiras </div>
</div>
</body>
</html> 
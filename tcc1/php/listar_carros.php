<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href=".\imagens\icons/icon.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="./js/bar.js"></script>
<link rel="stylesheet" type="text/css" href="../css/listar.css"/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.listar.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
		<title>CRUD - Listar/Ler</title>		
	</head>
	<body>
	 <!--  BARRA DE NAVEGAÇÃO -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000">
<a class="navbar-brand" href="../index.php">HyperSports</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li class="nav-item">
        <a class="nav-link" href="../carros.php"><img src="../imagens/icons/car.png" align="center">&nbsp;&nbsp;&nbsp;Carros a Venda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <img src="../imagens/icons/cadastro.png"align="center">
          Cadastros
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="../form.php"><img src="../imagens/icons/pessoal.png"align="center">Cadastro Pessoal</a>
        <a class="dropdown-item" href="../formcarro.php"><img src="../imagens/icons/cadastrocarro.png"align="center"> Cadastro Carro</a>
        <a class="dropdown-item" href="../fornecedor.php"><img src="../imagens/icons/fornecedor.png"align="center"> Cadastro Fornecedor</a>
        </div>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="../topcars.php"><img src="../imagens/icons/topcar.png"align="center">&nbsp;&nbsp;&nbsp;&nbsp;TOP Carros <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="listar_carros.php"><img src="../imagens/icons/listar.png"align="center">&nbsp;&nbsp;&nbsp;&nbsp; Listar <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="../login.php"><img src="../imagens/icons/login.png" align="center">Logar <span class="sr-only">(current)</span></a>
      </li>
      &nbsp;&nbsp;&nbsp;
      <li class="nav-item">
      <a class="nav-link" href="../logout.php"><img src="../imagens/icons/deslogar.png"align="center">Deslogar <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<!-- Fim da Nav -->
<li id='listar'><a href='../formcarro.php'><img src='../imagens/icons/voltar.png' align-text="bottom"> Voltar para o Cadastro</a></li>

		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		
<?php

include_once("conexao.php");// Esse é o arquivo de conexao
/*Primeiro coloco o arquivo de conexão com o banco. 
Depois faço a query/consulta pelo php no nosso banco 
de dados que é o banco ZEEN. */

$result_usuarios= "select * from carros"; 
$resultado_usuarios = mysqli_query($conn, $result_usuarios);  
/*Faço a seleção dos dados da tabela pela minha query 
dai mando conectar com o banco pelo meu arquivo de conexao
$conn e digo o que quero buscar da tabela, nesse caso, todos
os campos da tabela usuários */
// ---------------------------------------------------------
while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
  echo "<table align=center border=1 bordercolor=white>".
  "<tr>"."<td colspan='3' style='background-color:black;'>"."<h4 style='color:#fff;'>"."Carro:"."</h1>"."</td>"."</tr>";
    echo "<tr>". 
    "<td>"."CHASSI:"."</td>".
   "<td >".$row_usuario['chassi'] . "</td>"."</tr>";
    echo "<tr>".
    "<td> " ."MARCA:"."</td>".
    "<td >".$row_usuario['idmarca'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."ANO: " ."</td>"."<td >".$row_usuario['ano'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."MODELO:"."</td>"."<td >".$row_usuario['modelo'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."COR: "."</td>"."<td > ".$row_usuario['cor'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."QUANTIDADE: "."</td>"."<td >".$row_usuario['quantidade'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."NOME: "."</td>"."<td >".$row_usuario['nome'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."CAMBIO: "."</td>" ."<td >".$row_usuario['cambio'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."KM:"."</td>"."<td >".$row_usuario['km'] ."</td>"."</tr>";
		    echo "<tr>"."<td >"."CATEGORIA: " ."</td>"."<td >".$row_usuario['categoria'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."PREÇO: " ."</td>"."<td >".$row_usuario['preco'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."CARACTERISTICA 1: " ."</td>"."<td >".$row_usuario['caracteristica_1'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."CARACTERISTICA 2: " ."</td>"."<td > ".$row_usuario['caracteristica_2'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."CARACTERISTICA 3: " ."</td>"."<td >".$row_usuario['caracteristica_3'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."CARACTERISTICA 4: " ."</td >"."<td >".$row_usuario['caracteristica_4'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."CARACTERISTICA 5: " ."</td>"."<td >".$row_usuario['caracteristica_5'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."CARACTERISTICA 6: " ."</td>"."<td >".$row_usuario['caracteristica_6'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."COMBUSTIVEL: " ."</td>"."<td >".$row_usuario['combustivel'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."MOTOR: " ."</td>"."<td >".$row_usuario['motor'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."DESCRIÇÃO: " ."</td>"."<td >".$row_usuario['descricao'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."RÁDIO: " ."</td>"."<td >".$row_usuario['radio'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."PARTE ELÉTRICA: " ."</td>"."<td >".$row_usuario['parte_eletrica'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."FOTO 1: " ."</td>"."<td >".$row_usuario['foto1'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."FOTO 2: " ."</td>"."<td >".$row_usuario['foto2'] ."</td>"."</tr>";
        echo "<tr>"."<td >"."FOTO 3: " ."</td>"."<td >".$row_usuario['foto3'] ."</td>"."</tr>";

        echo "<tr>".
        "<td id='l'>".
        "<a href='edit_carros.php?chassi=".$row_usuario['chassi'] . "'>"."<img src='../imagens/icons/editar.png' text-align=center/>    Editar    </a>".
        "</td>".
        "<td id='r'>".
        "<a  href='proc_apagar_carros.php?chassi=".$row_usuario['chassi'] . "'><img src='../imagens/icons/excluir.png' align=center/> Excluir </a>".
        "</td>".
        "</tr>";
        echo "</table>";
        echo "<hr>";
    }
?>
</table>
</body>
</html>
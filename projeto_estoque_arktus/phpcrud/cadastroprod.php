<?php
session_start();
include_once ("conexao.php");

//FILTER_SANITIZE_STRING função que limpa os dados que vem do formulário
$nome = $_POST ['nome'];
$descricao = $_POST ['descricao'];
$preco = $_POST ['preco'];

$result_usuario = "INSERT INTO produto (nome, descricao, preco)  VALUES ('$nome', '$descricao','$preco');";

/* Na tabela coloque o campo data_criacao como DATETIME e como não nulo */
if(mysqli_query($conn, $result_usuario) or die (mysqli_error($conn))){
	$_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
/*Na propriedade p é do css usamos somente para mostrar se foi ou não 
cadastrado com sucesso ou não */
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Não foi possível cadastrar" . mysqli_error($conn) . "</p>";
}

header("Location: ../index.php")
?>
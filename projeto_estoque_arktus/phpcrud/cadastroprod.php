<?php
session_start();
include_once ("conexao.php");

//FILTER_SANITIZE_STRING função que limpa os dados que vem do formulário
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO produto (nome, descricao, preco)  VALUES ('$nome', '$descricao','$preco');";

/* Na tabela coloque o campo data_criacao como DATETIME e como não nulo */
if(mysqli_query($conn, $result_usuario)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
} else{
	$_SESSION['msg'] = "<p style='color:red;'>Não foi possível cadastrar" . mysqli_error($conn) . "</p>";
}
header("Location: ../index.php");
exit();
?>
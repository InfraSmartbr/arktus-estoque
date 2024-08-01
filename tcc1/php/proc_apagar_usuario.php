<?php
session_start();
include_once("conexao.php");
$cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT);
if(!empty($cpf)){
	$result_usuario = "DELETE FROM cliente WHERE cpf='$cpf'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:yellow; text-align:center; font-size:20px;'>Usuário apagado com sucesso</p>";
		header("Location: listar.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:orange; text-align:center; font-size:20px;'>Erro o usuário não foi apagado com sucesso</p>";
		header("Location: listar.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: listar.php");
}

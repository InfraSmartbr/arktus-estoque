<?php
session_start();
include_once("conexao.php");
$cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT);
if(!empty($cpf)){
	$result_usuario = "DELETE FROM funcionario WHERE cpf='$cpf'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:yellow; text-align:center; font-size:20px;'>Funcionario apagado com sucesso</p>";
		header("Location: listaradm.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:orange; text-align:center; font-size:20px;'>Erro o funcionario não foi apagado com sucesso</p>";
		header("Location: listaradm.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um funcionario</p>";
	header("Location: listaradm.php");
}
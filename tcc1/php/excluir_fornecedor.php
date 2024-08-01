<?php
session_start();
include_once("conexao.php");
$cnpj = filter_input(INPUT_GET, 'cnpj', FILTER_SANITIZE_NUMBER_INT);
if(!empty($cnpj)){
	$result_usuario = "DELETE FROM fornecedor WHERE cnpj='$cnpj'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:yellow; text-align:center; font-size:20px;'>Fornecedor apagado com sucesso</p>";
		header("Location: listar_fornecedor.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:orange; text-align:center; font-size:20px;'>Erro o Fornecedor não foi apagado com sucesso</p>";
		header("Location: listar_fornecedor.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Fornecedor</p>";
	header("Location: listar_fornecedor.php");
}
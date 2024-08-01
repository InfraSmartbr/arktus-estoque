<?php
session_start();
include_once("conexao.php");
$chassi = filter_input(INPUT_GET, 'chassi', FILTER_SANITIZE_NUMBER_INT);
if(!empty($chassi)){
	$result_usuario = "DELETE FROM carros WHERE chassi='$chassi'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:yellow; text-align:center; font-size:20px;'>Carro apagado com sucesso</p>";
		header("Location: listar_carros.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:orange; text-align:center; font-size:20px;'>Erro o Carro não foi apagado com sucesso</p>";
		header("Location: listar_carros.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Carro</p>";
	header("Location: listar_carros.php");
}

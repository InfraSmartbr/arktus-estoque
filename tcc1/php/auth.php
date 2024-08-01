<?php 
session_start();
include("conexao.php");

	$cpf = $_POST['cpf'];
	$cnpj= $_POST['cnpj'];
	$senha = $_POST['senha'];

	

	$sqlcliente = "SELECT * FROM cliente WHERE cpf = '$cpf' AND senha = '$senha' limit 1;";
	$sqlfuncionario = "SELECT * FROM funcionario WHERE cpf = '$cpf' AND senha = '$senha' limit 1;";
	$sqlfornecedor = "SELECT * FROM fornecedor WHERE cnpj = '$cnpj' AND senha = '$senha' limit 1;";

	$querycliente = mysqli_query($conn, $sqlcliente);
	$queryfuncionario = mysqli_query($conn, $sqlfuncionario);	
	$queryfornecedor = mysqli_query($conn, $sqlfornecedor);
	

	if(mysqli_num_rows($querycliente)>0){
		
		$query1 = mysqli_query($conn, $sqlcliente) or die(mysqli_error($conn));
		$dados1 = mysqli_fetch_assoc($query1);
		$linhas1 = mysqli_num_rows($query1);
		
        $_SESSION['cpf'] = $cpf;
		$_SESSION['senha'] = $senha;
		$_SESSION['tipo'] = "cliente";
		
		header("location:../indexcliente.php");
		
	}else if(mysqli_num_rows($queryfuncionario)>0){
		
		$query1 = mysqli_query($conn, $sqlfuncionario) or die(mysqli_error($conn));
		$dados1 = mysqli_fetch_assoc($query1);
		$linhas1 = mysqli_num_rows($query1);
		
		$_SESSION['cpf'] = $cpf;
		$_SESSION['senha'] = $senha;
		$_SESSION['tipo'] = "funcionario";

		header("location:../indexx.php");
		
	 }else if(mysqli_num_rows($queryfornecedor)>0){
		
		$query1 = mysqli_query($conn, $sqlfornecedor) or die(mysqli_error($conn));
		$dados1 = mysqli_fetch_assoc($query1);
		$linhas1 = mysqli_num_rows($query1);
		
		$_SESSION['cnpj'] = $cnpj;
		$_SESSION['senha'] = $senha;
		$_SESSION['tipo'] = "fornecedor";

		header("location:../mainfornecedor.php");
		
	 } 
	 else{
        unset($_SESSION['cpf']);
		unset($_SESSION['senha']);
		header('location:../login.php');
		$_SESSION['msglogin'] = "<p style='color:yellow;'>Usuário ou Senha Incorreto(s)! Tente novamente. </p>"; 
	 }
?>
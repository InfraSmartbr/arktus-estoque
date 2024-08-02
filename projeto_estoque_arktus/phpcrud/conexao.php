<?php
header("content-type: text/html;charset=utf-8");
	$server = "localhost";
	$usuario = "root";
	$senha = "p1nc3l";
	$database = "mydb";

    //Criando a conexão
	$conn = new mysqli($server, $usuario, $senha, $database); 
    
    //verificando a conexão
    if ($conn->connect_error){
        die("falha na conexão: " . $conn->connect_error);
    } 
	mysqli_set_charset($conn,"utf8");

?>
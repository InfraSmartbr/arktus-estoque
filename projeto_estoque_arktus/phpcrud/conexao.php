<?php
header("content-type: text/html;charset=utf-8");
	$server = "localhost";
	$usuario = "root";
	$senha = "";
	$database = "mydb";

    //Criando a conexão
	$conn = new mysqli($server, $usuario, $senha, $database); 
    
    //verificando a conexão
    if ($conn->connect_error){
        die("falha na conexão: " . $comm->connect_error);
    }  
	mysqli_set_charset($conn,"utf8");

?>
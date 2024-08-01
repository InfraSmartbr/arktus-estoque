<?php
header("content-type: text/html;charset=utf-8");
	$server = "localhost";
	$usuario = "root";
	$senha = "";
	$database = "hypersport";

	$conn = new mysqli($server, $usuario, $senha, $database) or die (mysqli_error($conn));
	mysqli_set_charset($conn,"utf8");

?>
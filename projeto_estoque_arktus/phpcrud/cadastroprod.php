<?php
session_start();
include_once ("phpcrud/conexao.php");

$nome = $_POST['nome'];
//FILTER_SANITIZE_STRING função que limpa os dados que vem do formulário
$cpf = $_POST ['cpf'];
$data_nasc = $_POST ['data_nasc'];
$rua = $_POST ['rua'];
$numero_resi = $_POST ['numero_resi'];
$complemento = $_POST ['complemento'];
$cep = $_POST['cep'];
$telefone = $_POST ['telefone'];
$email = $_POST ['email'];
$sobrenome = $_POST ['sobrenome'];
$rg = $_POST ['rg'];
$bairro = $_POST ['bairro'];
$estado = $_POST ['estado'];
$cidade = $_POST ['cidade'];
$pais = $_POST ['pais'];
$senha = $_POST ['senha'];

$result_usuario = "INSERT INTO cliente (nome, cpf, data_nasc, rua, numero, complemento, cep, telefone, email, sobronome, rg, bairro, estado, cidade, pais, senha) VALUES ('$nome', '$cpf', '$data_nasc', '$rua', '$numero', '$complemento', '$cep', '$telefone', '$email', '$sobronome', '$rg', '$bairro', '$estado', '$cidade', '$pais', '$senha')";

$resultado_usuario = mysqli_query($conn, $result_usuario);
/* essas variaveis result servem uma para inserção de dados, outra pra conexao,
now é uma função do php para pegar a data e hora do momento */

/* Na tabela coloque o campo data_criacao como DATETIME e como não nulo */
if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: form.php");
/*Na propriedade p é do css usamos somente para mostrar se foi ou não 
cadastrado com sucesso ou não */
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: form.php");
}


?>
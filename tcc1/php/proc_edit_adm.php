<?php
    session_start();                                             /* DADOS DO FORMULARIO/ BD */ 
    include("conexao.php");

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $rg = $_POST['rg'];
    $email = $_POST['email'];
    $data_nasc = $_POST['data_nasc'];
    $telefone = $_POST ['telefone'];
    $senha= $_POST['senha'];
    $rua = $_POST ['rua'];
    $bairro = $_POST ['bairro'];
    $cidade = $_POST ['cidade'];
    $pais = $_POST ['pais'];
    $cep = $_POST['cep'];
    $numero_local = $_POST['numero_local'];
    $complemento = $_POST ['complemento'];
    $estado = $_POST ['estado'];
                                            /* SQL DE INSERÇÃO DE DADOS */ 
    $sql = "UPDATE funcionario SET cpf='$cpf', nome='$nome', sobrenome='$sobrenome', rg='$rg', email='$email', data_nasc='$data_nasc', telefone='$telefone', senha='$senha', rua='$rua', bairro='$bairro', cidade='$cidade', pais='$pais', cep='$cep', numero_local='$numero_local', complemento='$complemento', estado='$estado' WHERE cpf='$cpf'";
    
        if(mysqli_query($conn, $sql) or die(mysqli_error($conn))){
            $_SESSION['msg'] = "<p style='color:yellow; text-align:center; font-size:20px;'>Dados alterado com sucesso!</p>";
            header("Location: listaradm.php");
        /*Na propriedade p é do css usamos somente para mostrar se foi ou não 
        cadastrado com sucesso ou não */
        }else{
            $_SESSION['msg'] = "<p style='color:orange; text-align:center; font-size:20px;'>Dados alterado com sucesso!</p>";
            header("Location: listaradm.php");
        }
?>
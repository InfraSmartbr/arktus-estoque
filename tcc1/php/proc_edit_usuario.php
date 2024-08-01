<?php
    session_start();                                             /* DADOS DO FORMULARIO/ BD */ 
    include("conexao.php");

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $data_nasc = $_POST['data_nasc'];
        $email = $_POST['email'];
        $cep = $_POST['cep'];
        $numero_local = $_POST['numero_local'];
        $rua = $_POST ['rua'];
        $bairro = $_POST ['bairro'];
        $cidade = $_POST ['cidade'];
        $estado = $_POST ['estado'];
        $pais = $_POST ['pais'];
        $complemento = $_POST ['complemento'];
        $telefone = $_POST ['telefone'];
        $senha = $_POST ['senha'];
                                                /* SQL DE INSERÇÃO DE DADOS */ 
        $sql = "UPDATE cliente SET nome='$nome',sobrenome='$sobrenome',cpf='$cpf',rg='$rg',data_nasc='$data_nasc', email='$email', cep='$cep', numero_local='$numero_local',rua='$rua', bairro='$bairro', cidade='$cidade', estado='$estado', pais='$pais', complemento='$complemento', telefone='$telefone', senha='$senha', modified=NOW() WHERE cpf='$cpf'";
    
        if(mysqli_query($conn, $sql) or die(mysqli_error($conn))){
            $_SESSION['msglistar'] = "<p style='color:yellow; text-align:center; font-size:20px;'>Dados alterado com sucesso! Faça o Login Novamente.</p>";
            header("Location: ../index.php");
        /*Na propriedade p é do css usamos somente para mostrar se foi ou não 
        cadastrado com sucesso ou não */
        }else{
            $_SESSION['msglistar'] = "<p style='color:orange; text-align:center; font-size:20px;'>Dados alterado com sucesso!</p>";
            header("Location: ../index.php");
        }
?>

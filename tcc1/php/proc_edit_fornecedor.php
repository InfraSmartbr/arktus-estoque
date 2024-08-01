<?php
    session_start();                               /* DADOS DO FORMULARIO/ BD */ 
    include("conexao.php");

        $cnpj= $_POST['cnpj'];
        $nome = $_POST['nome'];
        $idmarca = $_POST['idmarca'];
        $carros_chassi = $_POST['carros_chassi'];
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $numero_local = $_POST['numero_local'];
        $bairro = $_POST['bairro'];
        $complemento = $_POST ['complemento'];
        $cidade = $_POST ['cidade'];
        $uf = $_POST ['uf'];
        $pais = $_POST ['pais'];
        $senha = $_POST ['senha'];
                                                /* SQL DE INSERÇÃO DE DADOS */ 
        $sql = "UPDATE fornecedor SET cnpj='$cnpj',nome='$nome', idmarca='$idmarca',carros_chassi='$carros_chassi',cep='$cep',rua='$rua',numero_local='$numero_local',bairro='$bairro',complemento='$complemento',cidade='$cidade', uf='$uf',pais='$pais', cnpj='$cnpj', senha='$senha' where cnpj='$cnpj'";
    
        if(mysqli_query($conn, $sql) or die(mysqli_error($conn))){
            $_SESSION['msglistarfornecedor'] = "<p style='color:yellow; text-align:center; font-size:20px;'>Fornecedor editado com sucesso! Faça o Login Novamente.</p>";
            header("Location: ../index.php");
        /*Na propriedade p é do css usamos somente para mostrar se foi ou não 
        cadastrado com sucesso ou não */
        }else{
            $_SESSION['msglistarfornecedor'] = "<p style='color:yellow; text-align:center; font-size:20px;'>Fornecedor não foi editado com sucesso</p>";
            header("Location: ../index.php");
        }
?>
<?php
                                   /* DADOS DO FORMULARIO/ BD */ 
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
        $sql = "INSERT INTO fornecedor (cnpj, nome, idmarca, carros_chassi, cep, rua,numero_local, bairro,complemento, cidade, uf, pais,senha) VALUES ('$cnpj','$nome', '$idmarca', '$carros_chassi', '$cep', '$rua', '$numero_local', '$bairro','$complemento', '$cidade', '$uf', '$pais','$senha');";
    
        if(mysqli_query($conn, $sql) or die(mysqli_error($conn))){
            $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
            header("Location:../fornecedor.php");
        /*Na propriedade p é do css usamos somente para mostrar se foi ou não 
        cadastrado com sucesso ou não */
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
            header("Location: ../fornecedor.php");
        }
?>
<?php
    session_start();                                          /* DADOS DO FORMULARIO/ BD */ 
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
        $sql = "INSERT INTO cliente (nome,sobrenome, cpf, rg, data_nasc, email, cep, numero_local, rua, bairro, cidade, estado, pais, complemento, telefone,senha) VALUES ('$nome','$sobrenome', '$cpf', '$rg', '$data_nasc', '$email', '$cep', '$numero_local','$rua', '$bairro', '$cidade', '$estado', '$pais', '$complemento', '$telefone', '$senha');";
    
        if(mysqli_query($conn, $sql) or die(mysqli_error($conn))){
            $_SESSION['msg'] = "<p style='color:yellow; text-align:center; font-size:20px;/'>Usuário cadastrado com sucesso</p>";
            header("Location:../form.php");
        /*Na propriedade p é do css usamos somente para mostrar se foi ou não 
        cadastrado com sucesso ou não */
        }else{
            $_SESSION['msg'] = "<p style='color:orange; text-align:center; font-size:20px;'>Usuário não foi cadastrado com sucesso</p>";
            header("Location: ../form.php");
        }
?>
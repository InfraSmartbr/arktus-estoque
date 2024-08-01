<?php
    session_start();                                          /* DADOS DO FORMULARIO/ BD */ 
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
        $sql = "INSERT INTO funcionario (cpf,nome,sobrenome, rg, email, data_nasc, telefone, senha,rua, bairro, cidade, pais, cep, numero_local, complemento, estado) VALUES ('$cpf','$nome','$sobrenome', '$rg', '$email', '$data_nasc', '$telefone','$senha', '$rua', '$bairro', '$cidade', '$pais','$cep', '$numero_local', '$complemento', ' $estado');";
    
        if(mysqli_query($conn, $sql) or die(mysqli_error($conn))){
            $_SESSION['msg'] = "<p style='color:yellow; text-align:center; font-size:20px;/'>Funcionario cadastrado com sucesso</p>";
            header("Location:../form.php");
        /*Na propriedade p é do css usamos somente para mostrar se foi ou não 
        cadastrado com sucesso ou não */
        }else{
            $_SESSION['msg'] = "<p style='color:orange; text-align:center; font-size:20px;'>Funcionario não foi cadastrado com sucesso</p>";
            header("Location: ../form.php");
        }
?>
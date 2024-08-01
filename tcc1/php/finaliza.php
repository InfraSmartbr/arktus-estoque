<?php
    session_start();                                          /* DADOS DO FORMULARIO/ BD */ 
    include("conexao.php");

        $cliente_cpf = $_POST['cliente_cpf'];
        $carros_chassi = $_POST['carros_chassi'];
        $cod_pagamento = $_POST['cod_pagamento'];
        $dados_cartao = $_POST ['dados_cartao'];
        $nome_titular_cartao = $_POST ['nome_titular_cartao'];
        $cvv = $_POST['cvv'];
        $vencimento = $_POST['vencimento'];
        $parcelas = $_POST['parcelas'];
        $identrega = $_POST['identrega'];

                                                /* SQL DE INSERÇÃO DE DADOS */ 
        $sql = "INSERT INTO compra (cliente_cpf,carros_chassi,cod_pagamento,dados_cartao,nome_titular_cartao,cvv,vencimento,parcelas,identrega,data_hora) VALUES ('$cliente_cpf','$carros_chassi','$cod_pagamento','$dados_cartao','$nome_titular_cartao','$cvv','$vencimento', $parcelas,'$identrega', now());";
    
        if(mysqli_query($conn, $sql) or die(mysqli_error($conn))){
            $_SESSION['msgcompra'] = "<p style='color:yellow; text-align:center; font-size:20px;/'>COMPRA BEM SUCEDIDA, A HYPERSPORT AGRADECE</p>";
            header("Location:../indexx.php");
        /*Na propriedade p é do css usamos somente para mostrar se foi ou não 
        cadastrado com sucesso ou não */
        }else{
            $_SESSION['msgcompra'] = "<p style='color:orange; text-align:center; font-size:20px;'>Compra não foi bem sucedida </p>";
            header("Location: ../pagamento.php");
        }
?>
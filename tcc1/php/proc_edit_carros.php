<?php
    session_start();                                             /* DADOS DO FORMULARIO/ BD */ 
    include("conexao.php");

        $chassi = $_POST['chassi'];
        $idmarca = $_POST['idmarca'];
        $ano = $_POST['ano'];
        $modelo = $_POST['modelo'];
        $cor = $_POST['cor'];
        $quantidade = $_POST['quantidade'];
        $nome = $_POST['nome'];
        $cambio = $_POST['cambio'];
        $km = $_POST ['km'];
        $categoria = $_POST ['categoria'];
        $preco = $_POST ['preco'];
        $caracteristica_1 = $_POST ['caracteristica_1'];
        $caracteristica_2 = $_POST ['caracteristica_2'];
        $caracteristica_3 = $_POST ['caracteristica_3'];
        $caracteristica_4 = $_POST ['caracteristica_4'];
        $caracteristica_5 = $_POST ['caracteristica_5'];
        $caracteristica_6 = $_POST ['caracteristica_6'];
        $combustivel = $_POST ['combustivel'];
        $motor = $_POST ['motor'];
        $descricao = $_POST ['descricao'];
        $radio = $_POST ['radio'];
        $parte_eletrica = $_POST ['parte_eletrica'];
        $foto1 = $_FILES ['foto1']['name']; 
        $foto2 = $_FILES ['foto2']['name']; 
        $foto3 = $_FILES ['foto3']['name']; 
                                                /* SQL DE INSERÇÃO DE DADOS */ 
        $sql = "UPDATE carros SET chassi='$chassi',idmarca='$idmarca',ano='$ano',modelo='$modelo',cor='$cor', quantidade='$quantidade', nome='$nome', cambio='$cambio',km='$km', categoria='$categoria', preco='$preco', caracteristica_1='$caracteristica_1', caracteristica_2='$caracteristica_2', caracteristica_3='$caracteristica_3', caracteristica_4='$caracteristica_4', caracteristica_5=' $caracteristica_5', caracteristica_6='$caracteristica_6',combustivel='$combustivel', motor='$motor', descricao='$descricao', radio='$radio', parte_eletrica='$parte_eletrica', foto1='$foto1', foto2='$foto2', foto3='$foto3' where chassi='$chassi'";
    
        $diretorio['pasta'] = '../fotos/';
        mkdir($diretorio['pasta'],0777);
        move_uploaded_file($_FILES['foto1']['tmp_name'],$diretorio['pasta'].$foto1);
        move_uploaded_file($_FILES['foto2']['tmp_name'],$diretorio['pasta'].$foto2);
        move_uploaded_file($_FILES['foto3']['tmp_name'],$diretorio['pasta'].$foto3);

        if(mysqli_query($conn, $sql) or die(mysqli_error($conn))){
            $_SESSION['msg'] = "<p style='color:yellow; text-align:center; font-size:20px;'>Dados alterado com sucesso!</p>";
            header("Location: listar_carros.php");
        /*Na propriedade p é do css usamos somente para mostrar se foi ou não 
        cadastrado com sucesso ou não */
        }else{
            $_SESSION['msg'] = "<p style='color:orange; text-align:center; font-size:20px;'>Dados alterado com sucesso!</p>";
            header("Location: listar_carros.php");
        }
?>

<?php
    session_start();                                         /* DADOS DO FORMULARIO/ BD */ 
    include("conexao.php");

        $nome = $_POST['nome'];
        $chassi = $_POST['chassi'];
        $cor = $_POST['cor'];
        $ano = $_POST['ano'];
        $modelo = $_POST['modelo'];
        $categoria = $_POST['categoria'];
        $idmarca = $_POST['idmarca'];
        $quantidade = $_POST ['quantidade'];
        $km = $_POST ['km'];
        $cambio = $_POST ['cambio'];
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

        
        $sql = "INSERT INTO carros (nome,chassi, cor, ano, modelo, categoria,idmarca, quantidade, km, cambio, preco, caracteristica_1,caracteristica_2,caracteristica_3,caracteristica_4,caracteristica_5,caracteristica_6, combustivel, motor, descricao,radio,parte_eletrica,foto1,foto2,foto3) VALUES ('$nome','$chassi', '$cor', '$ano', '$modelo', '$categoria', '$idmarca','$quantidade', '$km', '$cambio', '$preco', '$caracteristica_1','$caracteristica_2','$caracteristica_3','$caracteristica_4','$caracteristica_5','$caracteristica_6', '$combustivel', '$motor', '$descricao','$radio','$parte_eletrica','$foto1','$foto2','$foto3');"; 
        

    

        
        $diretorio['pasta'] = '../fotos/';
        mkdir ($diretorio['pasta'],0777);
        move_uploaded_file($_FILES['foto1']['tmp_name'],$diretorio['pasta'].$foto1);
        move_uploaded_file($_FILES['foto2']['tmp_name'],$diretorio['pasta'].$foto2);
        move_uploaded_file($_FILES['foto3']['tmp_name'],$diretorio['pasta'].$foto3);
    
        if(mysqli_query($conn, $sql) or die(mysqli_error($conn))){
            $_SESSION['msg'] = "<p style='color:green;'>Carro cadastrado com sucesso</p>";
            header("Location:../formcarro.php");
        /*Na propriedade p é do css usamos somente para mostrar se foi ou não 
        cadastrado com sucesso ou não */
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Carro não foi cadastrado com sucesso</p>";
            header("Location: ../formcarro.php");
        }
?>
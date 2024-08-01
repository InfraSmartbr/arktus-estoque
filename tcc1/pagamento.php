<?php
include("php/conexao.php");
session_start();
$chassi= filter_input(INPUT_GET,'chassi');
//* Verificação de Login *//
if((!isset ($_SESSION['cpf']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);
    $_SESSION['msg']="<p style='color:yellow;text-align:center;font-size:17px;'>É PRECISO ESTAR LOGADO PARA ACESSAR ESTA PÁGINA</p>";
    header("Location: detalhes.php?chassi=$chassi");
  }
  else if 
  ((!isset ($_SESSION['cnpj']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['cnpj']);
    unset($_SESSION['senha']);
    $_SESSION['msg']="<p style='color:yellow;text-align:center;font-size:17px;'>É PRECISO ESTAR LOGADO PARA ACESSAR ESTA PÁGINA</p>";
    header("Location: detalhes.php");
}
$chassi = filter_input(INPUT_GET,'chassi');
?>
 <!doctype html>
 <html>
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width">
         <link rel="stylesheet" href="css/bootstrap.css">
         <link rel="stylesheet" href="css/compra.css">
         <link rel="stylesheet" href="css/pagamento.css">
         <link rel="shortcut icon" href="imagens/icons/pagamento.png">
         <title>Detalhes da compra</title>
         <style>
         ::-webkit-input-placeholder {
   color: #fff;
}

:-moz-placeholder { /* Firefox 18- */
   color: #fff;  
}

::-moz-placeholder {  /* Firefox 19+ */
   color: #fff;  
}

:-ms-input-placeholder {  
   color: #fff;  
}>
         </style>
     </head>
     <body>
     <div class="jumbotron jumbotron-fluid">
     <div class="container">
         <!-- para o h1 e p que já tínhamos, somente adicionar as respectivas classes -->
         <h1 class="display-4">Ótima escolha!</h1>
         <p class="lead">Obrigado por escolher a Hyper Sports
                 Preencha seus dados para efetivar a compra.</p>

     </div><!-- fim .container dentro do jumbotron -->
 </div><!-- fim .jumbotron -->
 <div class="card mb-3">
     <div class="card-header">
         <h2 class="display-5">Sua compra!</h2>
     </div><!-- fim .card-header -->
     <div class="container">
     <div class="card-body">
     <form action="php/finaliza.php" method="POST" enctype="multipart/form-data">

  <!-- ////////////////////////////////////////////// DADOS DO CARRO ////////////////////////// -->
 <?php $result_carros = "SELECT * FROM carros WHERE chassi = '$chassi'";
$resultado_carros = mysqli_query($conn, $result_carros);
$row_carros = mysqli_fetch_assoc($resultado_carros);
?>
    <div class="container_compra">   
    <?php echo '<div class="componente-1"><img class="imagem" src="fotos/'.$row_carros['foto1'].'" ></div>';?>
     <div class="componente-2"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="nome_carro" disabled value="NOME: <?php echo $row_carros['nome'];?>"></div>
     <div class="componente-3"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="ano" disabled value="ANO: <?php echo $row_carros['ano']; ?>"></div>
     <div class="componente-4">
       <label>CHASSI:</label><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%; text-align:center;" type="text" name="carros_chassi" value="<?php echo $row_carros['chassi']; ?>"/></div>
     <div class="componente-5"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="preco" disabled value="VALOR: <?php echo $row_carros['preco']; ?>"></div>
     <div class="componente-6"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="modelo" disabled value="MODELO: <?php echo $row_carros['modelo']; ?>"></div>
     <div class="componente-7"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="cor" disabled value="COR: <?php echo $row_carros['cor']; ?>"></div>
     <div class="componente-8"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="km" disabled value="KM: <?php echo $row_carros['km']; ?>"></div>
  </div>

<!-- ////////////////////////////////////////////// TITULO DOS DADOS ////////////////////////// -->
       <div class="card mb-3">
     <div class="card-header">
         <h5 class="display-5" style="font-size:24px;text-align:center;font-style: italic">CONFIRME E PREENCHA OS DADOS</h5>
     </div><!-- fim .card-header -->
    </div>

<!-- ////////////////////////////////////////////// DADOS ////////////////////////// -->
<?php $result_cliente = "SELECT * FROM cliente WHERE cpf = '".$_SESSION['cpf']."'";
$resultado_cliente = mysqli_query($conn, $result_cliente);
$row_cliente = mysqli_fetch_assoc($resultado_cliente);
?>
  <div class="container_dados">
    <div class="componente-9">
      <label  style="margin:0;"for="cliente_cpf">CPF:</label>
      <input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;margin:0;" type="text" id="cliente_cpf" name="cliente_cpf" value="<?php echo $row_cliente['cpf'];?>" /></div>
    <div class="componente-10"><label for="nome">NOME COMPLETO: </label> <input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" id="nome"type="text" name="nome" value="<?php echo $row_cliente['nome']. '&nbsp;'. $row_cliente['sobrenome'] ; ?>"disabled></div>
    <div class="componente-11"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="rua" value="RUA: <?php echo $row_cliente['rua']; ?>"disabled></div>
    <div class="componente-12"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="bairro" value="BAIRRO: <?php echo $row_cliente['bairro']; ?>"disabled></div>
    <div class="componente-13"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="" value="CIDADE: <?php echo $row_cliente['cidade']; ?>"disabled></div>
    <div class="componente-14"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="" value="ESTADO: <?php echo $row_cliente['estado']; ?>"disabled></div>
    <div class="componente-15"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="" value="PAIS: <?php echo $row_cliente['pais']; ?>"disabled></div>
    <div class="componente-16"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="" value="CEP: <?php echo $row_cliente['cep']; ?>"disabled></div>
    <div class="componente-17"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="" value="NUMERO: <?php echo $row_cliente['numero_local']; ?>"disabled></div>
    <div class="componente-18"><input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="text" name="" value="COMPLEMENTO: <?php echo $row_cliente['complemento']; ?>"disabled></div>
    <!-- parte pagamento -->
    <div class="componente-19">PAGAMENTO</div>
    <div class="componente-20">
    <select name="cod_pagamento" style=" background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%;" align="center" required>
    <option selected disabled style="background-color:rgba(12, 11, 11, 0.05);color:#000;border-color:transparent; width: 100%;height: 100%; text-align:center;"> Selecione o Método de Pagamento </option>
    <?PHP 
      	$result_pagamento = "SELECT * FROM pagamento";
        $resultado_pagamento= mysqli_query($conn, $result_pagamento);
      while($row_pagamento = mysqli_fetch_assoc($resultado_pagamento)){ 
       echo "<option style='background:rgba(12, 11, 11, 0.05);color:#000;border-color:transparent; width: 100%;height: 100%; text-align:center;' id='cod_pagamento' value=".$row_pagamento['cod_pagamento'].">". $row_pagamento['tipo']."&nbsp;"."-"."&nbsp;". $row_pagamento['descricao']."</option>";
       } ?>
    </select>
    </div>
    <div class="componente-21">
    <label for="dados_cartao">NÚMERO DO CARTÃO</label>
    <input style="background-color:green;color:#fff;border-color:transparent; width: 100%; text-align:center;placeholder{color:#fff};" type="text" id="dados_cartao" name="dados_cartao" placeholder="Digite aqui o número do seu cartão:">
    </div>
    <div class="componente-22">
    <label for="nome_titular_cartao">NOME COMPLETO DO TITULAR</label>
    <input id="nome_titular_cartao"style="background-color:green;color:#fff;border-color:transparent; width: 100%;text-align:center;placeholder{color:#fff};" type="text" name="nome_titular_cartao" placeholder="Digite aqui o Nome completo do Titular:">
    </div>
    <div class="componente-23">
    <label for="cvv">CVV*</label>
    <input style="background-color:green;color:#fff;border-color:transparent; width: 100%;text-align:center;placeholder{color:#fff};" type="text" id="cvv" name="cvv" placeholder="Código CVV:">
    </div>
    <div class="componente-24">
    <label for="vencimento">Vencimento</label>
    <input style="background-color:green;color:#fff;border-color:transparent; width: 100%;text-align:center;placeholder{color:#fff};" type="text" id="vencimento" name="vencimento" placeholder="Digite o vencimento do cartão:">
    </div>
    <div class="componente-25">
    <label for="vencimento">Parcelas(caso seja Crédito)</label>
    <select name="parcelas" style=" background-color:green;color:#fff;border-color:transparent; width: 100%;height: 100%;" align="center">
    <option selected disabled style="background-color:green;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> Parcelamento: </option>
    <option value="1" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 1x Sem Juros </option>
    <option value="2" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 2x Sem Juros </option>
    <option value="3" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 3x Sem Juros </option>
    <option value="4" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 4x Sem Juros </option>
    <option value="5" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 5x Sem Juros </option>
    <option value="6" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 6x Sem Juros </option>
    <option value="7" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 7x Sem Juros </option>
    <option value="8" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 8x Sem Juros </option>
    <option value="9" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 9x Sem Juros </option>
    <option value="10" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 10x Sem Juros </option>
    <option value="11" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 11x Sem Juros </option>
    <option value="12" style="background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;"> 12x Sem Juros </option>
    </select>
    </div>
    <div class="componente-26">ENTREGA</div>
    <div class="componente-27">
    <select name="identrega" style=" background-color:rgba(12, 11, 11, 0.05);color:#fff;border-color:transparent; width: 100%;height: 100%;" align="center">
    <option selected disabled style="background-color:rgba(12, 11, 11, 0.05);color:#000;border-color:transparent; width: 100%;height: 100%; text-align:center;"> Selecione o Método de Envio </option>
    <?PHP 
      	$result_entrega = "SELECT * FROM entrega";
        $resultado_entrega= mysqli_query($conn, $result_entrega);
      while($row_entrega = mysqli_fetch_assoc($resultado_entrega)){ 
       echo "<option style='background:rgba(12, 11, 11, 0.05);color:#000;border-color:transparent; width: 100%;height: 100%; text-align:center;' id='identrega' value=".$row_entrega['identrega'].">". $row_entrega['tipo']."&nbsp;"."-"."&nbsp;". $row_entrega['descricao']."</option>";
       } ?>
    </div>
    <div class="componente-28"><?php
		if(isset($_SESSION['msgcompra'])){
			echo $_SESSION['msgcompra'];
			unset($_SESSION['msgcompra']);}?></div>
    <div class="componente-29">
    <input style="background-color:transparent;color:#fff;border-color:transparent; width: 100%;height: 100%; text-align:center;" type="hidden" name="cod_compra" value="<?php echo $row_compra['cod_compra']; ?>"></div>
    <div class="componente-30">
    <button type="submit" class="btn btn-dark" style="color:white;background-color:green;">FINALIZAR COMPRA</button>
  </div>
  
  </form>
     </body>
 </html>

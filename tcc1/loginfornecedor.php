<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br" >
<head>
<a href="index.php" style="font-size:18px; color:white;border:2px solid white; background-color:rgb(160, 9, 9);padding:3px;"><img src='./imagens/icons/voltar.png' align-text="bottom"> VOLTAR</a>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href=".\imagens\icons/icon.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">

  <title>Login</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="css/login.css">
  		<script type="text/javascript" >

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
        $("#pais").val("");
       }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
                $("#pais").val("");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#estado").val(dados.uf);
                        
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

</script>
</head>

<body>

  <div class="form">
        <div id="entrar">   
          <h1>Bem Vindo !!</h1>
          
          <form action="php/auth.php" method="POST" enctype="form-data/multipart" >
          
            <div class="field-wrap">
            <label>
              CNPJ<span class="req">*</span>
            </label>
            <input type="text"required name="cnpj" autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Senha<span class="req">*</span>
            </label>
            <input type="password"required name="senha" autocomplete="off"/>
          </div>
          
          <!-- <p class="forgot"><a href="#">Esqueceu sua senha?</a></p> -->
          
          <button type="submit" class="button button-block"/>Entrar</button>
          </form>
          <?php
    if(isset($_SESSION['msglogin'])){
?><?=$_SESSION['msglogin']?>
<?php
    }
    session_destroy();
?>
      </div>
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  

    <script  src="js/script.js"></script>




</body>

</html>

<?php
    session_start();
    include("php/conexao.php");
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
      
      <ul class="tab-group">
        <li class="tab active"><a href="#entrar">Entrar</a></li>
        <li class="tab"><a href="#inscrevase">Inscreva-se</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="entrar">   
          <h1>Bem Vindo Novamente!!</h1>
          
          <form action="php/auth.php" method="POST" enctype="form-data/multipart" >
          
            <div class="field-wrap">
            <label>
              CPF<span class="req">*</span>
            </label>
            <input type="text"required name="cpf" autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Senha<span class="req">*</span>
            </label>
            <input type="password"required name="senha" autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="loginfornecedor.php">Login Fornecedor</a></p>
          
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
        <!--  CADASTRO PARA O CLIENTE-->
        <div id="inscrevase">   
          <h1>Inscreva-se Gratuitamente</h1>
          
          <form action="php/cadastrocliente.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Nome<span class="req">*</span>
              </label>
              <input type="text" required id="nome" name="nome" autocomplete="off" />
            </div>
            <div class="field-wrap">
              <label>
                Sobrenome<span class="req">*</span>
              </label>
              <input type="text"required id="sobrenome" name="sobrenome" autocomplete="off"/>
            </div>
          </div>
          <div class="top-row">
          <div class="field-wrap">
              <label>
                CPF <span class="req">*</span>
              </label>
              <input type="text" name="cpf" id="cpf"required autocomplete="off" />
            </div>
            <div class="field-wrap">
              <label>
                RG<span class="req">*</span>
              </label>
              <input type="text" name="rg" id="rg" required autocomplete="off" />
            </div>
           </div>
           <div class="field-wrap">
              <label>
                Data de Nascimento <span class="req">*</span>
              </label>
              <input type="text" name="data_nasc" id="datanasc" required autocomplete="off" />
            </div>
          <div class="field-wrap">
            <label>
              E-mail<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
          <div class="top-row">
          <div class="field-wrap">
              <label>
                CEP<span class="req">*</span>
              </label>
              <input type="text" name="cep" id="cep" required autocomplete="off" />
            </div>
            <div class="field-wrap">
              <label>
                Número Casa<span class="req">*</span>
              </label>
              <input type="text" name="numero_local" id="numerolocal" required autocomplete="off" />
            </div>
            </div>
            <div class="field-wrap">
              <label>
                Rua <span class="req">*</span>
              </label>
              <input type="text" name="rua" id="rua" required autocomplete="off" />
            </div>
            <div class="top-row">
            <div class="field-wrap">
              <label>
                Bairro <span class="req">*</span>
              </label>
              <input type="text" name="bairro" id="bairro" required autocomplete="off" />
            </div>
            <div class="field-wrap">
              <label>
                Cidade <span class="req">*</span>
              </label>
              <input type="text" name="cidade" id="cidade" required autocomplete="off" />
            </div>
            </div>
            <div class="top-row">
            <div class="field-wrap">
              <label>
                Estado <span class="req">*</span>
              </label>
              <input type="text" name="estado" id="estado" required autocomplete="off" />
            </div>
            <div class="field-wrap">
              <label>
                Pais <span class="req">*</span>
              </label>
              <input type="text" name="pais" id="pais" required autocomplete="off" />
            </div>
            </div>
            <div class="top-row">
            <div class="field-wrap">
              <label>
                Complemento<span class="req">*</span>
              </label>
              <input type="text" name="complemento" id="complemento" required autocomplete="off" />
            </div>
            <div class="field-wrap">
              <label>
                Telefone <span class="req">*</span>
              </label>
              <input type="text" name="telefone" id="telefone" required autocomplete="off" />
            </div>
            </div>
          <div class="field-wrap">
            <label>
             Informe uma Senha <span class="req">*</span>
            </label>
            <input type="password"required name="senha" id="senha" autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Enviar</button>
          
          </form>
        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script type="text/javascript" src="./js/jquery.mask.min.js"></script>	
		<script type="text/javascript">
			$("#cpf").mask("000.000.000-00");
			$("#salario").mask("999.999.990,00", {reverse: true});
			$("#cep").mask("00.000-000");
			$("#titulo").mask ("0000 0000 0000 00");
			$("#datanasc").mask("00/00/0000");
			
			$("#rg").mask("999.999.999-W", {
				translation: {
					'W': {
						pattern: /[X0-9]/
					}
				},
				reverse: true
			})
			
			var options = {
				translation: {
					'A': {pattern: /[A-Z]/},
					'a': {pattern: /[a-zA-Z]/},
					'S': {pattern: /[a-zA-Z0-9]/},
					'L': {pattern: /[a-z]/},
				}
			}
			
			$("#placa").mask("AAA-0000", options)
			
			$("#codigo").mask("AA.LLL.0000", options)
			
			$("#telefone").mask("(00) 0000-00009")
			
			$("#telefone").blur(function(event){
				if ($(this).val().length == 15){
					$("#telefone").mask("(00) 00000-0009")
				}else{
					$("#telefone").mask("(00) 0000-00009")
				}
			});
		</script>
  

    <script  src="js/script.js"></script>




</body>

</html>

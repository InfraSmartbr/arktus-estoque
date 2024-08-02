<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Cadastro do produto</title>
    <link rel="stylesheet" href="css/index.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                let msg = document.getElementById('msg');
                if (msg) {
                    msg.style.display = 'none';
                }
            }, 5000); // 5000 milissegundos = 5 segundos
        });
    </script>
</head>
<body> 
    <!-- CORPO DA PAGINA  -->
    <div class="corpo">
    <?php
       if (isset($_SESSION['msg'])) {
           echo "<div id='msg' class='msg " . (strpos($_SESSION['msg'], 'green') !== false ? 'msg-green' : 'msg-red') . "'>" . $_SESSION['msg'] . "</div>";
           unset($_SESSION['msg']);
       }
    ?>
    <!-- TOPO DA PAGINA  -->
    <div class="topo">
        <div class="opcao-top-logo"><a href="index.php"><img class="top-img" src="./imagens/smart.png"></a></div>
        <div class="opcao-top-1"><a href='estoque.php' id="botao-sair"><img id="icone-top" src="./imagens/sair.png">SAIR</a></div>
    </div>
    <div class="topo-2">
        <div class="topo-2-1">
            <div id="btntp-1"><a href='movimentacao.php' id="botaotop"><img id='icone-top' src='imagens/movimentacao.png'>MOVIMENTAÇÃO</a></div>
            <div id="btntp-2"><a href='estoque.php' id="botaotop"><img id="icone-top" src="imagens/estoque.png">ESTOQUE</a></div>
        </div>
    </div>
    <div class="middle">
    <br></br>
        <div class="formulario">
                <form method="POST" action="phpcrud/cadastroprod.php">
                    <div class="titulo-formulario"><p>CADASTRO DE PRODUTOO<p></div>
                    &#8201;&#8201;&#8201;
                    <div id="form-linha-1">
                        <label for="nome_produto"> Nome do Produto:</label>
                        <br></br>
                        <input type="text" class="inputs" id="nome" name="nome" placeholder="Digite o nome do Produto"></input>
                        <br></br>
                    </div>
                    <div id="form-linha-2">
                        <label for="nome_produto"> Descrição: </label>
                        <br></br>
                        <input type="text" class="inputs" id="descricao" name="descricao" placeholder="Digite uma descrição para o produto"></input>
                        <br></br>
                    </div>
                    <div id="form-linha-3">
                        <label for="nome_produto"> Preço </label>
                        <br></br>
                        <input type="text" class="inputs" id="preco" name="preco" placeholder="Digite o preço do produto"></input>
                        <br></br>
                    </div>
                    <!-- <div id="form-linha-3">
                        <label for="nome_produto"> Usuário: </label>
                        <br></br>
                        <select class="inputs" name="tipo-usuario">
                            <option value="" disable selected>Selecione um Usuário</option>
                            <option value="2">Opção 2</option>
                            <option value="3">Opção 3</option>
                            <option value="4">Opção 4</option>
                        </select>
                        <br></br>
                    </div>
                    -->
                    <div id="button"><button type="submit">
                        <a class="animated-button1">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        CADASTRAR
                        </a></button>
                    </form>
                    </div> 
        </div>
    </div>
    <!-- RODAPE DA PAGINA  -->
    <footer>
    <div class="bot">
    <div class="titulo-bot"> @A equipe de Infraestrutura da Smartbr deixa claro que todos os direitos dos desta plataforma são da empresa Smartbr. </div>
        <div class="opcao-bot"><img class="bot-img-shop" src="./imagens/shop1.png"></div>
        <div class="opcao-bot"><img class="bot-img" src="./imagens/arktus.png"> </div>
        <div class="opcao-bot"><img class="bot-img" src="./imagens/isp.png"></div>
    </div>
    </footer>
</body>
</html>
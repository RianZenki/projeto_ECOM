<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOM - Encontre O Que Deseja</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/carrinho.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php   
        include_once('./cabecalho.php'); 
        if (!isset($_SESSION['codigo'])) header("Location: ./login.php");
    ?>

    <main>
        <div class="produtosCarrinhoContainer">
            <h2>Carrinho de compras</h2>
            <div class="infoLinha">
                <h3>Produto</h3>
                <h3>Qtd.</h3>
                <h3>Preço Total</h3>
            </div>
            <div class='grupoProdutos'>

                <?php
                include_once('./conexao.php');

                $sessionId = session_id();

                $sql = "SELECT * FROM cesta INNER JOIN produto ON cesta.codigoProduto = produto.codigo WHERE cesta.sessionId = '$sessionId' AND quantidade > 0";

                $resultado = mysqli_query($conexao, $sql);
                $valorFinal = 0;

                if(mysqli_num_rows($resultado) > 0) {
                    while($registro = mysqli_fetch_array($resultado)) {
                        $codigoProduto = $registro['codigo'];
                        $codigoCesta = $registro['codigoCesta'];
                        $nome = $registro['nome'];
                        $quantidade = $registro['quantidade'];
                        $preco =  $registro['valorTotal'];
                        $valorFinal += $preco;

                        echo "
                        <div class='produtoContainer'>
                            <div class='imagemProduto'>
                                <img src='../imagens/produto$codigoProduto.jpg' alt='$nome'>
                            </div>
                            <div class='infoProduto'>
                                <h2>$nome</h2>
                            </div>
                            <div class='break'></div>
                            <div class='qtdeProduto'>
                                <div class='qtdeProdutoInput'>
                                    <span><a href='./alterarQtd.php?status=menos&codigo=$codigoCesta'>-</a></span>
                                    <input type='number' value='$quantidade' min='1' max='999' maxlength='3'>
                                    <span><a href='./alterarQtd.php?status=mais&codigo=$codigoCesta'>+</a></span>
                                </div>
                                <div class='removerProduto'>
                                    <span class='remover'><a href='./alterarQtd.php?status=remover&codigo=$codigoCesta'>Remover</a></span>    
                                </div>
                            </div>
                            <div class='precoProduto'>
                                <p>R$ ".number_format($preco,2,",",".")."</p>
                            </div>
                        </div>               
                        ";

                    }
                }

                ?>

            </div>
            <div class="finalizarCompraContianer">
                <p>Valor Total:
                    <span>R$ <?php echo number_format($valorFinal,2,",","."); ?> </span>
                </p>
                <button type="button" onclick="concluirCompra()">Finalizar Compra</button>
            </div>
        </div>
        
    </main>

    <div class="modalContainer" id="compraConcluida">
        <div class="modal">
            <img src="../imagens/confirm.png" alt="Concluida">
            <h3>Compra Concluída</h3>
        </div>
    </div>

    <script src="../js/carrinho.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOM - Encontre O Que Deseja</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include_once('./cabecalho.php') ?>

    <section>
        <div class="carrossel">
            <a href="./lista-produtos.php?categoria=periférico" class="carrosselItem itemVisivel">
                <img src="../imagens/banner1.png" alt="imagem1">
            </a>

            <a href="./lista-produtos.php?categoria=mouse" class="carrosselItem">
                <img src="../imagens/banner2.png" alt="imagem2">
            </a>

            <a href="./lista-produtos.php?categoria=monitor" class="carrosselItem">
                <img src="../imagens/banner3.png" alt="imagem3">
            </a>

            <div class="botoesCarrossel">
                <button id="btnAnt">&lt;</button>
            </div>
            <div class="botoesCarrossel">
                <button id="btnProx">&gt;</button>
            </div>
        </div>
    </section>

    <main>
        <section class="maisVendidos">
            <h2>Mais vendidos</h2>

            <div class="produtosContainer">

                <?php
                    include_once('./conexao.php');
                    include_once('./montaLista.php');

                    $sql = "SELECT * FROM produto WHERE destaque = 1 LIMIT 4";

                    $res = mysqli_query($conexao, $sql);

                    echo montaLista($conexao, $sql);
                ?>

            </div>
        </section>
    </main>

    <footer></footer>
    
    <script src="../js/index.js"></script>
</body>
</html>
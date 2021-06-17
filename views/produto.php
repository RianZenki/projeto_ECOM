<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOM - Encontre O Que Deseja</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/produto.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include_once('./cabecalho.php') ?>

    <main>
        <div class="produtoContainer">
            <?php
                include_once('./conexao.php');

                $codigo = $_GET['codigo'];

                $sql = "SELECT * FROM produto WHERE codigo = $codigo";

                $res = mysqli_query($conexao, $sql);

                if($registro = mysqli_fetch_array($res)) {
                    $nome = $registro['nome'];
                    $categoria = $registro['categoria'];
                    $preco = $registro['preco'];
                    $descricao = $registro['descricao'];


                    echo "<img src='../imagens/produto$codigo.jpg' alt='$nome'>";
                    echo "<div class='informacoesProduto'>";
                        echo "<h1>$nome</h1>";
                        echo "<p>Categoria: <span>$categoria</span></p>";
                        echo "<p><strong>R$".number_format($registro['preco'],2,',','.')."</strong></p>";
                ?>
                    <form method="POST" action="./adicionar.php">

                        <label for="txtQtde">Quantidade</label>
                        <input type="number" name="txtQtde" id="txtQtde" min="1" value="1">
                        <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                        <input type="hidden" name="preco" value="<?php echo $preco; ?>">

                        <button>COMPRAR</button>
                    </form>
                </div>
        </div>
        <section>
           <h2>Descrição</h2>
            <?php
                echo "<p>$descricao</p>";     
                }
                else {
                    header('Location: ./index.php');
                }
            ?>

        </section>
    </main>

    <footer></footer>

</body>
</html>
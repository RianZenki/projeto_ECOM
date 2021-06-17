<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOM - Encontre O Que Deseja</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/lista-produto.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include_once('./cabecalho.php'); ?>

    <main>
        <section class="listProduto">

            <?php 
                include_once('./conexao.php');
                include_once('./montaLista.php');

                $categoria = ucfirst($_GET['categoria']);

                echo "<h2>$categoria</h2>";

                echo "<div class='produtosContainer'>"; 
                
                $sql = "SELECT * FROM produto WHERE categoria = '$categoria' ORDER BY nome";

                echo montaLista($conexao, $sql);       
            ?>

                </div>  
        </section>
    </main>

    <footer></footer>

</body>
</html>
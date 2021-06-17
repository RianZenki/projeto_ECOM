<?php 
    $categorias = ['notebook', 'monitor', 'fone', 'mouse', 'periférico'];
    session_start();
?>

<header>
    <div class="headerContainer">
        <a href="../views/index.php">
            <img src="../imagens/logo.png" alt="ECOM"> 
        </a> 

        <div class="pesquisaHeader">
            <form method="GET" action="busca-produto.php">
                <input type="text" name="pesquisa" id="txtPesq" placeholder="O que está procurando?">
                <button><img src="../imagens/lupa-24.png" alt="pesquisar"></button>
            </form>
        </div>

        <div class="itemsHeader">
            <div class="statusConta">
            <?php 
 
                if (isset($_SESSION["codigo"])) {
                    $nome = $_SESSION['nome'];
                    echo "<span>$nome</span>";
                    echo "<a href='./logout.php'>Logout</a>";
                }
                else {
                    echo "<a href='./login.php'>Login</a>";
                    echo "<a href='./cadastro.php'>Cadastre-se</a>";
                }
            ?>
            </div>

            <div class="carrinho">
                <a href="./carrinho.php">
                    <img src="../imagens/carrinho-32.png" alt="carrinho">
                </a>
            </div>
        </div>
    </div>
    <div class="menu">
        <nav>
            <ul>
                <?php 
                    foreach($categorias as $value) {
                        echo "<li><a href='./lista-produtos.php?categoria=".$value."' title='".ucfirst($value)."'>".ucfirst($value)."</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </div>
</header>
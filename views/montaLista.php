<?php
    function montaLista($conexao, $sql) {
        $resultado = mysqli_query($conexao, $sql);

        if(mysqli_num_rows($resultado) > 0) {
            while($registro = mysqli_fetch_array($resultado)) {
                $codigo = $registro['codigo'];
                $nome = $registro['nome'];
                $preco = number_format($registro['preco'],2,",",".");
            
                echo '<div class="produto">';
                    echo "<a href = './produto.php?codigo=$codigo'>";
                        echo "<img src='../imagens/produto$codigo.jpg' alt='$nome'>";               
                        echo '<div class="infoProduto">';
                                echo "<p>$nome</p>";
                                echo "<strong>R$$preco</strong>";
                        echo "</div>";
                    echo "</a>";
                echo '</div>';
            }
        }
        else {
            return "<p>Produto não encontrado</p>";
        } 

    }
?>
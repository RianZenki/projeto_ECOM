<?php
    
    include('./conexao.php');
    
    $status = $_GET['status'];
    $codigo = $_GET['codigo'];

    $sql = "SELECT * FROM cesta WHERE codigoCesta = $codigo";
        
    $res = mysqli_query($conexao, $sql);

    if($registro = mysqli_fetch_array($res)) {

        if ($status == 'remover') remover($codigo);
        else alterar($registro, $codigo, $status);
         
    }

    function alterar($registro, $codigo, $status) {

        include('./conexao.php');

        if ($status == 'mais') $quantidade = $registro['quantidade'] + 1;
        else $quantidade = $registro['quantidade'] - 1;

        $preco = $registro['valorUni'];
        $valorTotal = $preco * $quantidade;

        $sql = "UPDATE cesta SET quantidade = $quantidade, valorTotal = $valorTotal WHERE codigoCesta = $codigo";

        mysqli_query($conexao, $sql);
        header("Location:./carrinho.php");
    }

    function remover($codigo) {

        include('./conexao.php');

        $sql = "DELETE FROM cesta WHERE codigoCesta = $codigo"; 

        mysqli_query($conexao, $sql);
        header("Location:./carrinho.php");
    }


?>
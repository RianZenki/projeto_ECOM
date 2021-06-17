<?php 
    include_once('./conexao.php');
    session_start();

    if(isset($_SESSION['codigo'])) {
        $codigo = $_POST['codigo'];
        $quantidade = $_POST['txtQtde'];
        $preco = $_POST['preco'];
        $sessionId = session_id();
        $idCliente = $_SESSION['codigo'];
    
        $valorTotal = $preco * $quantidade;

        $sql = "INSERT INTO cesta (sessionId, codigoCliente, codigoProduto, quantidade, valorUni, ValorTotal) VALUES ('$sessionId', '$idCliente', '$codigo', $quantidade, $preco, $valorTotal)";
    
        if(mysqli_query($conexao, $sql))
    
        header("Location: ./carrinho.php");
      
    } else header("Location: ./login.php");


?>
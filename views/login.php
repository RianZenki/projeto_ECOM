<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOM - Encontre O Que Deseja</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/modal-senha.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        session_start();
        if (isset($_SESSION['codigo'])) header("Location: ./index.php");
    ?>

    <header>
        <div class="headerContainer">
            <a href="../views/index.php">
                <img src="../imagens/logo.png" alt="ECOM"> 
            </a> 
        </div>
    </header>

    <main>
        <h2>Login</h2>

        <form method="POST" action="login.php"> 
            <div class="formGroup">
                <div class="inputGroup">
                    <label for="txtEmail">Email</label>
                    <input type="text" name="txtEmail" id="txtEmail" placeholder="Digite seu email">
                </div>
            </div>

            <div class="formGroup">
                <div class="inputGroup">
                    <label for="txtSenha">Senha</label>
                    <input type="password" name="txtSenha" id="txtSenha" placeholder="Digite sua Senha">
                </div>
            </div>

            <span id="recSenha"><a>Esqueceu a senha?</a></span> 
            
            <div class="formGroup">
                <button name="btnLogar">Logar</button>
            </div>

        </form>


        <p>Não possui conta? <a href="./cadastro.php">cadastrar</a></p>
    </main>

    <div class="modalContainer" id="modalRecuperarSenha">
        <div class="modal">
            <button id="fechar" type="button">X</button>
            <form method="POST" action="./login.php">
                <h3>Trocar a senha</h3>
                <p>Entre com um email para receber um link para criar uma nova senha.</p>
                <div class="formGroup">
                    <div class="inputGroup">
                        <label for="txtEmail">Email</label>
                        <input type="text" name="txtEmailRecuperar" id="txtEmailRecuperar" placeholder="Digite seu email">
                        <button name="btnRecuperar">Receber email</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php 
    if(isset($_POST['btnLogar'])) realizarLogin();
    if(isset($_POST['btnRecuperar'])) recuperarSenha();    
?>

    <script src="../js/login.js"></script>
</body>
</html>

<?php
    function realizarLogin() {

        include_once("./conexao.php");
       
        $email = $_POST['txtEmail'];
        $senha = md5($_POST['txtSenha']);

        $sql = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'";

        $res = mysqli_query($conexao, $sql);

        if($registro = mysqli_fetch_array($res)) {
            session_start();
            $_SESSION['nome'] = $registro['nome'];
            $_SESSION['codigo'] = $registro['codigo'];
            header("Location: ./index.php");
            exit();
        }
        else {

            echo "<script>alert('Email ou senha inválidos!');</script>";
            session_destroy();
            return;
        }
    }

    function recuperarSenha() {
        $email = $_POST["txtEmailRecuperar"];
                
        $para = "to:$email";
        $assunto = "Recuperar senha";
        $mensagem = "Recuperar Senha";
        $header = "MIME-Version: 1.0\r\n";
        $header .= "from: Recuperar Senha<rian.zenki@gmail.com>";
      
        mail($para, $assunto, $mensagem, $header);
        echo "<script>alert('Senha enviado ao email');</script>";
    }
    

?>
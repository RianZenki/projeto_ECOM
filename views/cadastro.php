<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOM - Encontre O Que Deseja</title>
    <link rel="stylesheet" href="../styles/cadastro.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="headerContainer">
            <a href="../views/index.php">
                <img src="../imagens/logo.png" alt="ECOM"> 
            </a> 
        </div>
    </header>

    <main>
        <h2>Cadastre-se</h2>

        <form method="POST" action="./cadastro.php">
            <div class="formGroup">
                <div class="inputGroup">
                    <label for="txtNome">Nome</label>
                    <input type="text" name="txtNome" id="txtNome" placeholder="Digite seu nome" required>
                </div>
            </div>

            <div class="formGroup">
                <div class="inputGroup">
                    <label for="txtEmail">Email</label>
                    <input type="email" name="txtEmail" id="txtEmail" placeholder="Digite seu email" required>
                </div>      
            </div>

            <div class="formGroup">
                <div class="inputGroup">
                    <label for="txtSenha">Senha</label>
                    <input type="password" name="txtSenha" id="txtSenha" placeholder="Digite uma senha" required>
                </div>

                <div class="inputGroup">
                    <label for="txtSenhaConf">Confirmar Senha</label>
                    <input type="password" name="txtSenhaConf" id="txtSenhaConf" placeholder="Digite novamente a senha" required>
                </div>
            </div>

            <div class="formGroup">
                <div class="inputGroup">
                    <label for="txtCpf">CPF</label>
                    <input type="text" name="txtCpf" id="txtCpf" placeholder="xxx.xxx.xxx-xx" maxlength="14" required>
                </div>

                <div class="inputGroup">
                    <label for="txtData">Data de nascimento</label>
                    <input type="date" name="txtData" id="txtData" required>
                </div>

                <div class="inputGroup">
                    <label for="txtFone">Telefone (Opcional)</label>
                    <input type="text" name="txtFone" id="txtFone" placeholder="xxxxx-xxxx" maxlength="10" >
                </div>
            </div>

            <div class="formGroup">
                <button name="btnCadastrar">Cadastrar</button>
            </div>

        </form>

        <p>Já possui cadastro? <a href="./login.php">entrar</a></p>
    </main>

    
    <div class="modalContainer" id="cadastroConcluido">
        <div class="modal">
            <img src="../imagens/confirm.png" alt="Concluido">
            <h3>Cadastro Concluído</h3>
        </div>
    </div>

<?php 
    if(isset($_POST['btnCadastrar'])) realizarCadastro(); 
?>

<script src="../js/cadastro.js"></script>
</body>
</html>

<?php 

    function realizarCadastro() {

        include_once('./conexao.php');

        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        $senha = md5($_POST['txtSenha']);
        $senhaConfir = md5($_POST['txtSenhaConf']);
        $cpf = $_POST['txtCpf'];
        $dataNasci = $_POST['txtData'];
        $fone = $_POST['txtFone'];

        if($senha != $senhaConfir) {
            echo "<script>alert('Senhas incompativeis!');</script>";
            return;
        }

        $sql = "INSERT INTO cliente (nome, email, senha, cpf, dataNascimento, telefone) VALUES ('$nome', '$email', '$senha', '$cpf', '$dataNasci', '$fone')";

        if(mysqli_query($conexao, $sql)) {
            echo "<script>alert('Cadastro feito com sucesso!');</script>";
            header("Location: ./login.php");
        } else
            echo "<script>alert('ERRRO ao realizar cadastro!');</script>";

    }

?>
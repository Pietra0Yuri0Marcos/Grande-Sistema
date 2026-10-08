<?php
require_once __DIR__ . '/../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../style/style.css">
    <title>Cadastrar</title>
</head>
<body>
    <h1>Cadastrar usuário</h1>

    <form action="" method="post">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>
        <br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br><br>

        <input type="reset" value="Limpar">
        <input type="submit" value="Cadastrar">
        <br>
    </form>

    <?php 
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        cadastrar_user($conexao, $email, $senha);
    }
    ?>

    <a href="login.php">Voltar para o login</a>
</body>
</html>
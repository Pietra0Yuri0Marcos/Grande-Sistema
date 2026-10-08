<?php 
session_start();

require_once __DIR__ . '/../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../style/style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="" method="post">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>
        <br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br><br>

        <input type="submit" value="Entrar">
    </form>

    <p>Não possui uma conta? <a href="cadastro.php">Crie uma conta</a></p>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = consultar_user($conexao, $email);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_email'] = $usuario['email'];
            header("Location: ../index.php");
            exit;
        } else {
            echo "E-mail ou senha incorretos.";
        }
    }
    ?>
</body>
</html>
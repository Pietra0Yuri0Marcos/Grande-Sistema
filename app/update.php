<?php

require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../style/style.css">
    <title>Atualizar Filmes</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <h1>Atualizar filme</h1>

    <form action="" method="post">
        <label for="id">ID:</label>
        <input type="number" name="id" id="id">
        <br><br>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo">
        <br><br>

        <label for="genero">Gênero:</label>
        <input type="text" name="genero" id="genero">
        <br><br>

        <label for="diretor">Diretor:</label>
        <input type="text" name="diretor" id="diretor">
        <br><br>

        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano">
        <br><br>

        <label for="duracao">Duração:</label>
        <input type="number" name="duracao" id="duracao">
        <br><br>

        <label for="nota">Nota:</label>
        <input type="number" name="nota" id="nota">
        <br><br>

        <input type="reset" value="Limpar">
        <input type="submit" value="Atualizar">
        <br><br>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        atualizar_filme(
            $conexao,
            $_POST['id'],
            $_POST['titulo'], 
            $_POST['genero'], 
            $_POST['diretor'], 
            $_POST['ano'], 
            $_POST['duracao'], 
            $_POST['nota']
        );
    }
    ?>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
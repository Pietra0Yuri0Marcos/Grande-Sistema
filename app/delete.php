<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../style/style.css">
    <title>Deletar Filmes</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <h1>Excluir filme</h1>

    <form action="" method="post">
        <label for="id">ID do filme:</label>
        <input type="number" name="id" id="id">
        <br><br>

        <input type="submit" value="Excluir">
        <br><br>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        excluir_filme($conexao,$_POST['id']);
    }
    ?>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
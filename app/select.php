<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $filme_id = $_POST['filme_id'];
    $voto = $_POST['voto'];

    votar_filme(
        $conexao,
        $filme_id,
        $_SESSION['usuario_email'],
        $voto
    );
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../style/style.css">
    <title>Relatório Filmes</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <h1>Filmes cadastrados</h1>

    <?php relatorio_votos($conexao); ?>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
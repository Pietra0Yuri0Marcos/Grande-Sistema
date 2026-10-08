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
    <title>Pesquisar Filmes</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <h1>Pesquisar Filme</h1>

    <form action="" method="post">
        <label for="titulo">Digite o título:</label>
        <input type="text" name="titulo" id="titulo">
        <br><br>

        <input type="submit" value="Pesquisar">
        <br><br>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $filmes = pesquisar_filme($conexao, $_POST['titulo']);

        foreach ($filmes as $filme) {
            $votos = contar_votos($conexao, $filme['id']);

            echo "<div class='filme'>";
            echo "<p><strong>ID:</strong> {$filme['id']}</p>";
            echo "<p><strong>Título:</strong> {$filme['titulo']}</p>";
            echo "<p><strong>Gênero:</strong> {$filme['genero']}</p>";
            echo "<p><strong>Diretor:</strong> {$filme['diretor']}</p>";
            echo "<p><strong>Ano:</strong> {$filme['ano']}</p>";
            echo "<p><strong>Duração:</strong> {$filme['duracao']} minutos</p>";
            echo "<p><strong>Nota:</strong> ⭐ {$filme['nota']}</p>";
            echo "<p><strong>👍 Likes:</strong> {$votos['likes']}</p>";
            echo "<p><strong>👎 Dislikes:</strong> {$votos['dislikes']}</p>";
            echo "</div>";
        }
    }
    ?>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
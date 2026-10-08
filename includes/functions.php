<?php

require_once __DIR__ . '/../database/connect.php';

///////////////////

function cadastrar_filme($conexao, $titulo, $genero, $diretor, $ano, $duracao, $nota)
{
    $sql = "INSERT INTO filmes
            (titulo, genero, diretor, ano, duracao, nota)
            VALUES
            (:titulo, :genero, :diretor, :ano, :duracao, :nota)";

    try {
        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(":titulo", $titulo);
        $stmt->bindValue(":genero", $genero);
        $stmt->bindValue(":diretor", $diretor);
        $stmt->bindValue(":ano", $ano);
        $stmt->bindValue(":duracao", $duracao);
        $stmt->bindValue(":nota", $nota);

        if ($stmt->execute()) {
            echo "Filme cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o filme.";
        }

    } catch (PDOException $e) {
        echo "Erro no banco de dados: " . $e->getMessage();
    }
}

///////////////

function relatorio_filmes($conexao)
{
    $sql = "SELECT * FROM filmes";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($filmes as $filme) {
        echo "<div class='filme'>";
        echo "ID: {$filme['id']}<br>";
        echo "Título: {$filme['titulo']}<br>";
        echo "Gênero: {$filme['genero']}<br>";
        echo "Diretor: {$filme['diretor']}<br>";
        echo "Ano: {$filme['ano']}<br>";
        echo "Duração: {$filme['duracao']} minutos<br>";
        echo "Nota: {$filme['nota']}<br>";
        echo "</div>";
    }
}

///////////

function excluir_filme($conexao, $id)
{
    $sql = "DELETE FROM filmes WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(":id", $id);

    if ($stmt->execute()) {
    echo "Filme $id deletado com sucesso.";
    } else {
        echo "Erro ao excluir o filme.";
    }
}

/////////////////////

function consultar_filme($conexao, $id)
{
    $sql = "SELECT * FROM filmes WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $filme = $stmt->fetch(PDO::FETCH_ASSOC);

    return $filme;
}

////////////////////

function pesquisar_filme($conexao, $titulo)
{
    $sql = "SELECT * FROM filmes
            WHERE titulo LIKE :titulo";

    $stmt = $conexao->prepare($sql);

    $titulo = "%" . $titulo . "%";

    $stmt->bindParam(":titulo", $titulo);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

////////////////////

function atualizar_filme(
    $conexao,
    $id,
    $titulo,
    $genero,
    $diretor,
    $ano,
    $duracao,
    $nota
) {

    $sql = "UPDATE filmes SET
            titulo = :titulo,
            genero = :genero,
            diretor = :diretor,
            ano = :ano,
            duracao = :duracao,
            nota = :nota
            WHERE id = :id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":titulo", $titulo);
    $stmt->bindValue(":genero", $genero);
    $stmt->bindValue(":diretor", $diretor);
    $stmt->bindValue(":ano", $ano);
    $stmt->bindValue(":duracao", $duracao);
    $stmt->bindValue(":nota", $nota);

    if ($stmt->execute()) {
        echo "Filme atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o filme.";
    }
}

////////////////////////

function cadastrar_user($conexao, $email, $senha)
{
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios(email, senha)
            VALUES (:email, :senha)";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":senha", $senha_hash);

    $stmt->execute();

    echo "Usuário cadastrado com sucesso!";
}

////////////////////////////

function consultar_user($conexao, $email)
{
    $sql = "SELECT email, senha
            FROM usuarios
            WHERE email = :email";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(":email", $email);

    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario;
}

//////////////////////// VOTOS ->

function votar_filme($conexao, $filme_id, $usuario_email, $voto)
{
    $sql = "INSERT INTO votos (filme_id, usuario_email, voto)
            VALUES (:filme_id, :usuario_email, :voto)
            ON CONFLICT (filme_id, usuario_email)
            DO UPDATE SET voto = EXCLUDED.voto";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(":filme_id", $filme_id);
    $stmt->bindValue(":usuario_email", $usuario_email);
    $stmt->bindValue(":voto", $voto);

    $stmt->execute();
}


function contar_votos($conexao, $filme_id)
{
    $sql = "SELECT
                COUNT(*) FILTER (WHERE voto = 'like') AS likes,
                COUNT(*) FILTER (WHERE voto = 'dislike') AS dislikes
            FROM votos
            WHERE filme_id = :filme_id";

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(":filme_id", $filme_id);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/////

function relatorio_votos($conexao)
{
    $sql = "SELECT * FROM filmes";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($filmes as $filme) {

        $votos = contar_votos($conexao, $filme['id']);

        echo "<div class='filme'>";

        echo "ID: {$filme['id']}<br>";
        echo "Título: {$filme['titulo']}<br>";
        echo "Gênero: {$filme['genero']}<br>";
        echo "Diretor: {$filme['diretor']}<br>";
        echo "Ano: {$filme['ano']}<br>";
        echo "Duração: {$filme['duracao']} minutos<br>";
        echo "Nota: {$filme['nota']}<br><br>";

        echo "👍 {$votos['likes']} ";
        echo "👎 {$votos['dislikes']}<br><br>";

        echo "<form action='' method='post'>";

        echo "<input type='hidden' name='filme_id' value='{$filme['id']}'>";

        echo "<button type='submit' name='voto' value='like'>👍 Like</button>";

        echo "<button type='submit' name='voto' value='dislike'>👎 Dislike</button>";

        echo "</form>";

        echo "</div>";
    }
}

?>
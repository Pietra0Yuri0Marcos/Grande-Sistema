<?php
$host = "192.168.10.38";
$dbname = "grandesistema";
$user = "sistema";
$pass = "1234";

try {
    $conexao = new PDO(
        "pgsql:host=$host;dbname=$dbname",
        $user,
        $pass
    );
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
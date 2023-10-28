<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo'];

    if ($tipo === "atleta") {
        header("Location: cadastro_atleta.php");
    } elseif ($tipo === "chefe_delegacao" || $tipo === "arbitro") {
        header("Location: cadastro_pessoa.php");
    }
} else {
    // Lida com o caso em que nenhum tipo foi selecionado
    header("Location: tipo_cadastro.php");
    exit();
}
?>
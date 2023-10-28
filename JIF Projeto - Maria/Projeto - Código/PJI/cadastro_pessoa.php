<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

$currentPage = isset($_GET['page']) ? $_GET['page'] : 2;

$previousPage = $currentPage - 1;
$nextPage = $currentPage + 1;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_2/style.css">
    <link rel="shortcut icon" href="img/Logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Cadastro</title>
</head>
<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .back-button {
        padding: 5px 10px;
        text-decoration: none;
        background-color: green; 
        border: none;
        border-radius: 20px;
        color: white;
        cursor: pointer;
        font-size: 16px;
        transition: all 0.4s ease;
    }

    .back-button:hover {
        background-color: darkgreen; 
    }
</style>
<body>
    <div class="boxzinha">
        <div class="img-boxzinha">
            <img src="css_2/img-formulario.png">
        </div>
        <div class="formulario-boxzinha">
            <div class="header">
                <h2>Cadastro</h2>
                <a class="back-button" href="tipo_cadastro.php">Voltar</a>
            </div>

            <form action="#">
                <div class="inputszinha">
                    <label for="nome"> Nome Completo</label>
                    <input type="text" id="nome" placeholder="Digite o seu Nome Completo" required>
                </div>

                <div class="inputszinha">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" placeholder="Digite o seu CPF" required>
                </div>
                <div class="inputszinha">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input type="date" id="data_nasc" required>
                </div>
                <div class="inputszinha">
                    <label> Sexo: </label>
                </div>

                <div class="sexo">
                    <input type="radio" value="Masculino" name="sexo"> Masculino <br>
                    <input type="radio" value="Feminino" name="sexo"> Feminino <br>
                </div>

                <div class="inputszinha">
                    <button>Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

$currentPage = isset($_GET['page']) ? $_GET['page'] : 3;

$previousPage = $currentPage - 1;
$nextPage = $currentPage + 1;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_2/style_atleta.css">
    <link rel="shortcut icon" href="img/Logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Cadastro do Atleta</title>
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
        <div class="formulario-boxzinha">
            <div class="header">
                <h2>Cadastro do Atleta</h2>
                <a class="back-button" href="tipo_cadastro.php">Voltar</a>
            </div>

            <form action="#">
                <div class="inputszinha">
                    <label for="responsavel"> Nome Completo do Responsável </label>
                    <input type="text" id="responsavel" name="responsavel" placeholder = "Digite o nome do Responsável" required>
                </div>
                <div class="inputszinha">
                    <label for="nome"> Nome Completo Atleta</label>
                    <input type="text" id="nome" placeholder="Digite o seu Nome Completo" required>
                </div>
                <div class="inputszinha">
                    <label for="cpf"> CPF </label>
                    <input type="text" id="cpf" placeholder="Digite o seu CPF" required>
                </div>
                <div class="inputszinha">
                    <label for="rg">RG</label>
                    <input type="text" id="rg" name="rg" placeholder="Digite o seu RG" required>
                </div>

                <div class="inputszinha">
                    <label for="ra">RA (Prontuário)</label>
                    <input type="text" id="ra" name="ra" placeholder="Digite o seu RA" required>
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
                    <label for="rgpdf">Imagem do RG (PDF, máximo 1MB)</label>
                    <input type="file" class="form-control-file" id="rgpdf" name="rgpdf" accept=".pdf" required>
                </div>
                
                <div class="inputszinha">
                    <label for="fotopdf">Foto de Rosto (PDF, máximo 1MB)</label>
                    <input type="file" class="form-control-file" id="fotopdf" name="fotopdf" accept=".pdf" required>
                </div>

                <div class="inputszinha">
                    <button>Cadastrar</button>
                </div>
                <!--<div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated text-bg-warning" style="width: 100%">3</div>
                </div>-->
                

            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
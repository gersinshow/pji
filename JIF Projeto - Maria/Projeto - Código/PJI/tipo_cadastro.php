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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>Tipo de Cadastro</title>
</head>

<body>
    <div class="boxzinha">
        <div class="img-boxzinha">
            <img src="css_2/img-formulario.png">
        </div>
        <div class="formulario-boxzinha">
            <h2>Tipo de Cadastro</h2>

            <form action="redirecionar.php" method="post">
                <div class="inputszinha">
                    <br><br>
                    <label for="tipo">Função:</label>

                    <select name="tipo" id="tipo">
                        <option value="atleta">Atleta</option>
                        <option value="chefe_delegacao">Chefe de Delegação</option>
                        <option value="arbitro">Árbitro</option>
                    </select>
                    <br><br><br><br>
                    <button type="submit">Continuar</button>
                </div>
                <br>
                <div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 75%">2</div>
                </div>
                <br><br>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : ''; ?>">
                            <a class="page-link" href="<?php echo $previousPage == 1 ? 'unidades.php' : ($previousPage == 2 ? 'tipo_cadastro.php' : ''); ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item <?php echo $currentPage == 1 ? 'active' : ''; ?>">
                            <a class="page-link" href="unidades.php">1</a>
                        </li>
                        <li class="page-item <?php echo $currentPage == 2 ? 'active' : ''; ?>">
                            <a class="page-link" href="tipo_cadastro.php">2</a>
                        </li>
                        <li class="page-item <?php echo $currentPage == 3 ? 'active' : ''; ?>">
                            <a class="page-link" href="">3</a>
                        </li>
                        <li class="page-item <?php echo $currentPage == 3 ? 'disabled' : ''; ?>">
                            <a class="page-link" href="<?php echo $nextPage == 1 ? 'unidades.php' : ($nextPage == 2 ? 'tipo_cadastro.php' : ''); ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </form>
        </div>
    </div>
</body>

</html>

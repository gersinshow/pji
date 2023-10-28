<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

$previousPage = $currentPage - 1;
$nextPage = $currentPage + 1;

include('config.php');

$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtenha os dados do formulário
    $sigla = $_POST['sigla'];
    $campus = $_POST['campus'];

    // Obtenha o próximo valor único para 'id_unidade'
    $sql = "SELECT MAX(id_unidade) AS max_id FROM unidade";
    $result = $conexao->query($sql);
    $row = $result->fetch_assoc();
    $next_id = $row['max_id'] + 1;

    // Inserir os dados na tabela 'unidade' com o novo 'id_unidade'
    $sql = "INSERT INTO unidade (id_unidade, sigla_instituicao, campus) VALUES ('$next_id', '$sigla', '$campus')";
    
    if ($conexao->query($sql) === TRUE) {
        $successMessage = "Dados Inseridos com Sucesso.";
    } 
}

// Feche a conexão com o banco de dados
$conexao->close();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_2/style.css">
    <link rel="shortcut icon" href="img/Logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Cadastro de Unidades</title>
</head>

<body>
    <div class="boxzinha">
        <div class="img-boxzinha">
            <img src="css_2/img-formulario.png">
        </div>
        <div class="formulario-boxzinha">
            <h2>Unidades</h2>
            
            <form action="unidades.php" method="POST">
                <div class="inputszinha">
                    <label for="sigla"> Sigla da Instituição</label>
                    <input type="text" id="sigla" name = "sigla" placeholder="Digite a Sigla (IFSP)" required>
                </div>

                <div class="inputszinha">
                    <label for="campus">Câmpus</label>
                    <input type="text" id="campus" name = "campus" placeholder="Digite seu Câmpus (Araraquara)" required>
                </div>

                <div class="inputszinha">
                    <button id = "cadastrar-button">Inserir Unidade</button>
                </div>
                <br>

                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const cadastrarButton = document.getElementById("cadastrar-button");

                    cadastrarButton.addEventListener("click", function(event) {
                        // Executar a lógica de inserção de dados

                        // Após a inserção bem-sucedida, mostrar o alerta de sucesso
                        if ("<?php echo $successMessage; ?>" !== "") {
                            Swal.fire({
                                title: 'Sucesso',
                                text: "<?php echo $successMessage; ?>",
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                        }

                        event.preventDefault(); // Evita o envio padrão do formulário
                    });
                });
                </script>

                <div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 50%">1</div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
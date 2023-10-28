<?php
session_start();

$adminLogin = 'admin'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $adminLogin = 'admin';
    $adminSenha = 'admin';

    if ($login === $adminLogin && $senha === $adminSenha) {
        $_SESSION['admin'] = true;
        header("Location: unidades.php");
        exit();
    } else {
        $errorMessage = "Credenciais inválidas. Tente novamente.";
    }
}

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
    <title>Login</title>
</head>

<body>
    <div class="boxzinha">
        <div class="img-boxzinha">
            <img src="css_2/img-formulario.png">
        </div>
        <div class="formulario-boxzinha">
            <h2>Administrador</h2>
            
            <form action="login.php"  method="post">
                <div class="inputszinha">
                    <label for="nome"> Login</label>
                    <input type="text" id="login" name = "login" placeholder="Digite seu Login" required>
                </div>

                <div class="inputszinha">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name = "senha" placeholder="Digite sua senha" required>
                </div>

                <div class="inputszinha">
                    <button>Logar</button>
                </div>

            </form>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const errorMessage = "<?php echo isset($errorMessage) ? $errorMessage : '' ?>";
        const successMessage = "<?php echo isset($successMessage) ? $successMessage : '' ?>";

        if (errorMessage) {
            Swal.fire({
                title: 'Erro',
                text: errorMessage,
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
            });
        }

        if (successMessage) {
            Swal.fire({
                title: 'Sucesso',
                text: successMessage,
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        }
    });
    </script>
</body>
</html>
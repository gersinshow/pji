<?php
session_start();
include('config.php');

// Verifica se o usuário está autenticado como administrador
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

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
    <title>Cadastro de Partida</title>
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
                <h2>Cadastro de Partida</h2>
                <a class="back-button" href="cadastros-gerais.php">Voltar</a>
            </div>

            <form action="cadastro_partida.php" method="POST">

            <div class="inputszinha">
                    <label for="nome_campeonato">Campeonato</label>
                    <select name="nome_campeonato" id="nome_campeonato">
                    <?php
// VOCE PRECISA POR OS VALUE NOS INPUT COM OS ID MERMO
                        $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPorta);
                        // Recupera as opções do banco de dados
                        $sql = "SELECT titulo, ano FROM campeonato";
                        $resultado = $conexao->query($sql);
                            if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                echo '<option value="">'.$row["titulo"].' '.$row["ano"].' </option>';
                            }
                        } else {
                            echo '<option value="">Nenhuma equipe cadastrada</option>';
                        }
                    ?>
                    </select>
                </div>

            <div class="inputszinha">
                    <label for="nome_unidade1">Unidade 1</label>
                    <select name="nome_unidade1" id="nome_unidade1">
                    <?php

                        $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPorta);
                        // Recupera as opções do banco de dados
                        $sql = "SELECT id_unidade, sigla_instituicao, campus FROM unidade";
                        $resultado = $conexao->query($sql);
                            if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                echo '<option value="'.$row["id_unidade"].'">'.$row["sigla_instituicao"].' '.$row["campus"].'</option>';
                            }
                        } else {
                            echo '<option value="">Nenhuma unidade cadastrada</option>';
                        }
                    ?>
                    </select>
                </div>

                <div class="inputszinha">
                    <label for="nome_equipe1">Equipe 1</label>
                    <select name="nome_equipe1" id="nome_equipe1">
                    <?php

                        $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPorta);
                        // Recupera as opções do banco de dados
                        $sql = "SELECT nome FROM equipe";
                        $resultado = $conexao->query($sql);
                            if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                echo '<option value="">'.$row["nome"].' </option>';
                            }
                        } else {
                            echo '<option value="">Nenhuma equipe cadastrada</option>';
                        }
                    ?>
                    </select>
                </div>


                <div class="inputszinha">
                    <label for="nome_unidade2">Unidade 2</label>
                    <select name="nome_unidade2" id="nome_unidade2">
                    <?php
                        $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPorta);
                        // Recupera as opções do banco de dados
                        $sql = "SELECT id_unidade, sigla_instituicao, campus FROM unidade";
                        $resultado = $conexao->query($sql);
                            if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                echo '<option value="'.$row["id_unidade"].'">'.$row["sigla_instituicao"].' '.$row["campus"].'</option>';
                            }
                        } else {
                            echo '<option value="">Nenhuma unidade cadastrada</option>';
                        }
                    ?>
                    </select>
                </div>

                <div class="inputszinha">
                    <label for="nome_equipe2">Equipe 2</label>
                    <select name="nome_equipe2" id="nome_equipe2">
                    <?php

                        $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPorta);
                        // Recupera as opções do banco de dados
                        $sql = "SELECT nome FROM equipe";
                        $resultado = $conexao->query($sql);
                            if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {
                                echo '<option value="">'.$row["nome"].' </option>';
                            }
                        } else {
                            echo '<option value="">Nenhuma equipe cadastrada</option>';
                        }
                    ?>
                    </select>
                </div>

                <div class="inputszinha">
                    <label for="cidade"> Cidade</label>
                    <input type="text" id="cidade" name="cidade" placeholder = "Digite o nome da cidade da partida" required>
                </div>
                <div class="inputszinha">
                    <label for="local">Local da Partida</label>
                    <input type="text" id="local" name="local" placeholder="Digite o nome do local da partida" required>
                </div>
                <div class="inputszinha">
                    <label for="data"> Data </label>
                    <input type="date" id="data" name="data" placeholder="Digite a data da partida" required>
                </div>
                <div class="inputszinha">
                    <label for="hora">Horário</label>
                    <input type="time" id="hora" name="hora" placeholder="Digite o horário da partida" required>
                </div>

                <div class="inputszinha">
                    <label for="categoria">Categoria</label>
                    <input type="text" id="categoria" name="categoria" placeholder="Digite a categoria" >
                </div>
                <div class="inputszinha">
                    <label for="arbitro1">Árbitro 1</label>
                    <input type="text" id="arbitro1" name="arbitro1" required>
                </div>
                <div class="inputszinha">
                    <label for="arbitro2">Árbitro 2</label>
                    <input type="text" id="arbitro2" name="arbitro2" required>
                </div>
                <div class="inputszinha">
                    <label for="apontador">Apontador</label>
                    <input type="text" id="apontador" name="apontador" required>
                </div>
                <div class="inputszinha">
                    <label for="horario_1t_inicio">Horário do começo do 1º tempo</label>
                    <input type="time" id="horario_1t_inicio" name="horario_1t_inicio" placeholder="Digite o horário do inicio do primeiro tempo" required>
                </div>
                <div class="inputszinha">
                    <label for="horario_1t_fim">Horário do fim do 1º tempo</label>
                    <input type="time" id="horario_1t_fim" name="horario_1t_fim" placeholder="Digite o horário do fim do primeiro tempo" required>
                </div>
                <div class="inputszinha">
                    <label for="horario_2t_inicio">Horário do começo do 2º tempo</label>
                    <input type="time" id="horario_2t_inicio" name="horario_2t_inicio" placeholder="Digite o horário do inicio do segundo tempo" required>
                </div>
                <div class="inputszinha">
                    <label for="horario_2t_fim">Horário do fim do 2º tempo</label>
                    <input type="time" id="horario_2t_fim" name="horario_2t_fim" placeholder="Digite o horário do fim do segundo tempo" required>
                </div>
                <div class="inputszinha">
                    <label> Sexo: </label>
                </div>

                <div class="sexo">
                    <input type="radio" value="M" name="sexo"> Masculino <br>
                    <input type="radio" value="F" name="sexo"> Feminino <br>
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
                    <button type="submit" name="submit">Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>


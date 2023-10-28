<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'root';
    $dbName = 'projeto_jif';
    $dbPorta = 3306;

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $dbPorta);

    /*
    if($conexao->connect_errno)
    {
        echo "Erro";
    }
    else
    {
        echo "Conexão Efetuada com Sucesso";

    }*/


?>
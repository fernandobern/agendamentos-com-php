<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "lojinha_pet";

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Falha na conexão:". $conn->connect_error);
    } else {
        echo "Conectado com sucesso!<br>";
    }
?>
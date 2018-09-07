<?php

include 'connection.php';

if (isset($_GET["id"])) {
    $connection = $objDB->prepare("DELETE FROM `usuarios` WHERE id = " . $_GET["id"]);

    if(!$connection->execute()) {
        echo $connection->error . "<br /><a href='index.php'>Voltar</a>";
        exit;
    } else {
        echo "Usuário excluído com sucesso!<br /><a href='index.php'>Voltar</a>";
        exit;
    }

}
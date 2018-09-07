<?php

include 'connection.php';

if (isset($_POST["id"]) && isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"])) {
    $erro = "";
    if (empty($_POST["nome"])) {
        $erro .= "Nome obrigatório";
    }
    if (empty($_POST["email"])) {
        $erro .= ($erro === "") ? "" : ", ";
        $erro .= "E-Mail obrigatório";
    }
    if (empty($_POST["senha"])) {
        $erro .= ($erro === "") ? "" : ", ";
        $erro .= "Senha obrigatória";
    }

    if (empty($erro)) {
        $query = "";
        $tipo = "";
        if ($_POST["id"] === "0") {
            $query = "INSERT INTO `usuarios` (`nome`,`email`,`senha`) ";
            $query .= " VALUES ('" . $_POST["nome"] . "','" . $_POST["email"] . "','" . $_POST["senha"] . "')";

            $tipo = "cadastrado";
        } else {
            $query = "UPDATE `usuarios` SET ";
            $query .= " `nome` = '" . $_POST["nome"] . "'";
            $query .= ",`email` = '" . $_POST["email"] . "'";
            $query .= ",`senha` = '" . $_POST["senha"] . "'";
            $query .= " WHERE id = " . $_POST["id"] . "";

            $tipo = "alterado";
        }

        $connection = $objDB->prepare($query);

        if(!$connection->execute()) {
            echo $connection->error . "<br /><a href='index.php'>Voltar</a>";
            exit;
        } else {
            echo "Usuário " . $tipo . " com sucesso!<br /><a href='index.php'>Voltar</a>";
            exit;
        }

    } else {
        echo $erro . "<br /><a href='index.php'>Voltar</a>";
        exit;
    }
}
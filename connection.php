<?php

$objDB = new mysqli("localhost", "root", "", "TESTE_DISYS");

if ($objDB->connect_errno)
{
    echo "Erro de conexão.";
    exit;
}
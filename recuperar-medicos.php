<?php

require_once "vendor/autoload.php";

$caminhoBanco = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$caminhoBanco");

$statement = $pdo->query("SELECT * FROM medicos;");
foreach($statement->fetchAll() as $medico)
{
    echo $medico['nome'] . PHP_EOL;   
}
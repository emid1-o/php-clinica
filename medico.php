<?php

$caminhoBanco = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$caminhoBanco");

$pdo->exec("
    CREATE TABLE medicos (
        id PRIMARY KEY,
        crm TEXT,
        nome TEXT,
        especialidade TEXT
    );
");

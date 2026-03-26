<?php

$caminhoBanco = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$caminhoBanco");

$pdo->exec("
    CREATE TABLE medicos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        crm TEXT,
        nome TEXT,
        especialidade TEXT
    );

    CREATE TABLE pacientes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        cpf VARCHAR(11) NOT NULL UNIQUE,
        nome VARCHAR(160) NOT NULL,
        telefone VARCHAR(11) NULL,
        data_nascimento TIMESTAMP,
        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE IF NOT EXISTS pacientes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        cpf TEXT NOT NULL,
        nome TEXT NOT NULL,
        telefone TEXT NOT NULL,
        data_nascimento TEXT NOT NULL
    );

    CREATE TABLE IF NOT EXISTS consultas (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        medico_id INTEGER,
        paciente_id INTEGER,
        data_consulta TEXT NOT NULL,
        valor REAL NOT NULL,
        FOREIGN KEY(medico_id) REFERENCES medicos(id),
        FOREIGN KEY(paciente_id) REFERENCES pacientes(id)
    );
");

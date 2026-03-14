<?php

use Luizlins\Projeto01\Modulos\Medico;

require_once "vendor/autoload.php";

$caminhoBanco = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:$caminhoBanco");

$medico = new Medico(null, "CRM/PI 1234", "Luiz Lins", "Cardiologista");

$sqlInsert = "
    INSERT INTO medicos
        (id, crm, nome, especialidade)
        VALUES
        (6, '{$medico->recuperarCRM()}', 'teste', '{$medico->recuperarEspecialidade()}'),
";

echo $pdo->exec($sqlInsert);
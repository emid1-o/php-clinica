<?php
require_once "vendor/autoload.php";

use Luizlins\Projeto01\Dominio\Modulos\Paciente;
use Luizlins\Projeto01\Infraestrutura\Repositorios\RepositorioPaciente;

$paciente = new Paciente(
    "11122233344",
    "Carlos Almeida",
    ["86988887777"],
    new DateTimeImmutable("1998-05-20")
);

$repositorio = new RepositorioPaciente();
$repositorio->inserir($paciente);

echo "Paciente guardado com o ID: " . $paciente->recuperarId() . "\n";
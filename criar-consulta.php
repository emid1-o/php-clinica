<?php
require_once "vendor/autoload.php";

use Luizlins\Projeto01\Dominio\Modulos\Consulta;
use Luizlins\Projeto01\Infraestrutura\Repositorios\RepositorioMedico;
use Luizlins\Projeto01\Infraestrutura\Repositorios\RepositorioPaciente;
use Luizlins\Projeto01\Infraestrutura\Repositorios\RepositorioConsulta;

$repoMedico = new RepositorioMedico();
$listaMedicos = $repoMedico->listar();

$repoPaciente = new RepositorioPaciente();
$listaPacientes = $repoPaciente->listar();

$medico = $listaMedicos[0];
$paciente = $listaPacientes[0];

$consulta = new Consulta(
    $medico,
    $paciente,
    new \DateTimeImmutable('tomorrow 14:30'),
    300.00
);

$repoConsulta = new RepositorioConsulta();
$repoConsulta->agendar($consulta);

echo "Consulta agendada para o medico " . $medico->recuperarNome() . " e paciente " . $paciente->recuperarNome() . "\n";
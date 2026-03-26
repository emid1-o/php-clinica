<?php
require_once "vendor/autoload.php";

use Luizlins\Projeto01\Infraestrutura\Repositorios\RepositorioPaciente;

$repositorio = new RepositorioPaciente();
$pacientes = $repositorio->listar();

if (!empty($pacientes)) {
    $paciente = $pacientes[0];
    
    try {
        $repositorio->deletar($paciente);
        echo "Paciente excluido.\n";
    } catch (\PDOException $e) {
        echo "Nao foi possivel excluir o paciente. Verifique se ele possui consultas agendadas.\n";
    }
}
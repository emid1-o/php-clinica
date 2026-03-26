<?php
require_once "vendor/autoload.php";

use Luizlins\Projeto01\Infraestrutura\Repositorios\RepositorioPaciente;

$repositorio = new RepositorioPaciente();
$pacientes = $repositorio->listar();

if (!empty($pacientes)) {
    $paciente = $pacientes[0];
    
    $pacienteCorrigido = new \Luizlins\Projeto01\Dominio\Modulos\Paciente(
        $paciente->recuperarCpf(),
        $paciente->recuperarNome() . " Silva",
        ["86900001111"],
        $paciente->recuperarDataNascimento()
    );
    
    $pacienteCorrigido->definirId($paciente->recuperarId());
    
    $repositorio->atualizar($pacienteCorrigido);
    
    echo "Paciente atualizado com sucesso.\n";
}
<?php
namespace emidio\Projeto01\Dominio\Modulos;

use DateTimeImmutable;

class Consulta {
    private $id;

    public function __construct(
        private Medico $medico,
        private Paciente $paciente,
        private DateTimeImmutable $data,
        private float $valor
    ) {}

    public function recuperarId() {
        return $this->id;
    }

    public function definirId($id) {
        $this->id = $id;
    }

    public function recuperarMedico() {
        return $this->medico;
    }

    public function recuperarPaciente() {
        return $this->paciente;
    }

    public function recuperarData() {
        return $this->data;
    }

    public function recuperarValor() {
        return $this->valor;
    }
}
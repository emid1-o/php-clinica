<?php

namespace Luizlins\Projeto01\Modulos;

use Luizlins\Projeto01\Modulos\Medico;
use Luizlins\Projeto01\Modulos\Paciente;
use DateTimeImmutable;

class Consulta {

    function __construct(
        private Medico $medico,
        private Paciente $paciente,
        private DateTimeImmutable $data,
        private float $valor
    ) {}

}
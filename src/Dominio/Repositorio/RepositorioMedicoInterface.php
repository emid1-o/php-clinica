<?php

namespace Luizlins\Projeto01\Dominio\Repositorio;

use Luizlins\Projeto01\Dominio\Modulos\Medico;

interface RepositorioMedicoInterface
{

    public function inserirMedico(Medico $medico);
    public function deletarMedico(Medico $medico);
    public function editarMedico(Medico $medico);
    public function recuperarMedico(Medico $medico);

}

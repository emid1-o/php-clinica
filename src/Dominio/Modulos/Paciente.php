<?php
namespace emidio\Projeto01\Dominio\Modulos;

use DateTimeImmutable;
use Exception;

class Paciente {
    private $id;

    public function __construct(
        private string $cpf,
        private string $nome,
        private array $telefone,
        private DateTimeImmutable $dataNascimento
    ) {
        $cpfLimpo = preg_replace('/[^0-9]/is', '', $cpf);
        
        if (strlen($cpfLimpo) !== 11 || preg_match('/(\d)\1{10}/', $cpfLimpo)) {
            throw new Exception("Erro: CPF informado nao tem formato valido");
        }
        
        $this->cpf = $cpfLimpo;
    }

    public function recuperarId() {
        return $this->id;
    }

    public function definirId($id) {
        $this->id = $id;
    }

    public function recuperarCpf() {
        return $this->cpf;
    }

    public function recuperarNome() {
        return $this->nome;
    }

    public function recuperarTelefones() {
        return $this->telefone;
    }

    public function recuperarDataNascimento() {
        return $this->dataNascimento;
    }
}
<?php
namespace emidio\Projeto01\Infraestrutura\Repositorios;

use emidio\Projeto01\Dominio\Modulos\Paciente;
use emidio\Projeto01\Infraestrutura\Persistencia\FabricaConexao;
use DateTimeImmutable;

class RepositorioPaciente {
    private $conexao;

    public function __construct() {
        $this->conexao = FabricaConexao::criarConexao();
    }

    public function inserir(Paciente $paciente) {
        $sql = "INSERT INTO pacientes (cpf, nome, telefone, data_nascimento) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        
        $tels = json_encode($paciente->recuperarTelefones());
        $data = $paciente->recuperarDataNascimento()->format('Y-m-d');

        $sucesso = $stmt->execute([
            $paciente->recuperarCpf(),
            $paciente->recuperarNome(),
            $tels,
            $data
        ]);

        if($sucesso) {
            $paciente->definirId($this->conexao->lastInsertId());
        }

        return $sucesso;
    }
    
    public function listar() {
        $sql = "SELECT * FROM pacientes";
        $stmt = $this->conexao->query($sql);
        $resultados = $stmt->fetchAll();
        
        $pacientes = [];
        foreach($resultados as $linha) {
            $tels = json_decode($linha['telefone'], true);
            $data = new DateTimeImmutable($linha['data_nascimento']);
            
            $p = new Paciente(
                $linha['cpf'],
                $linha['nome'],
                $tels,
                $data
            );
            $p->definirId($linha['id']);
            $pacientes[] = $p;
        }
        
        return $pacientes;
    }

    public function atualizar(Paciente $paciente) {
        $sql = "UPDATE pacientes SET cpf = ?, nome = ?, telefone = ?, data_nascimento = ? WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        
        $tels = json_encode($paciente->recuperarTelefones());
        $data = $paciente->recuperarDataNascimento()->format('Y-m-d');

        $stmt->execute([
            $paciente->recuperarCpf(),
            $paciente->recuperarNome(),
            $tels,
            $data,
            $paciente->recuperarId()
        ]);
    }

    public function deletar(Paciente $paciente) {
        $sql = "DELETE FROM pacientes WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$paciente->recuperarId()]);
    }
}
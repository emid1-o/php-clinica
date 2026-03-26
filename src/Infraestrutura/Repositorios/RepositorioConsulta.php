<?php
namespace emidio\Projeto01\Infraestrutura\Repositorios;

use emidio\Projeto01\Dominio\Modulos\Consulta;
use emidio\Projeto01\Infraestrutura\Persistencia\FabricaConexao;

class RepositorioConsulta {
    private $conexao;

    public function __construct() {
        $this->conexao = FabricaConexao::criarConexao();
    }

    public function agendar(Consulta $consulta) {
        $sql = "INSERT INTO consultas (medico_id, paciente_id, data_consulta, valor) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        
        $data = $consulta->recuperarData()->format('Y-m-d H:i');
        
        $sucesso = $stmt->execute([
            $consulta->recuperarMedico()->recuperarId(),
            $consulta->recuperarPaciente()->recuperarId(),
            $data,
            $consulta->recuperarValor()
        ]);

        if($sucesso) {
            $consulta->definirId($this->conexao->lastInsertId());
        }

        return $sucesso;
    }
}
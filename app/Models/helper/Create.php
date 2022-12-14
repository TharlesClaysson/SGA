<?php

namespace App\Models\helper;

use Exception;

if (!defined('URL')) {
    header("Location: /");
    exit();
}


class Create extends Conn
{
    private $Tabela;
    private $Dados;
    private $Query;
    private $Conn;
    private $Resultado;
    
    function getResultado()
    {
        return $this->Resultado;
    }

    
    public function exeCreate($Tabela, array $Dados)
    {
        $this->Tabela = (string) $Tabela;
        $this->Dados = $Dados;
        $this->getIntrucao();
        $this->executarInstrucao();
    }
    
    private function getIntrucao()
    {
        $colunas = implode(', ', array_keys($this->Dados));
        $valores= ':' . implode(', :', array_keys($this->Dados));
        $this->Query = "INSERT INTO {$this->Tabela} ({$colunas}) VALUES ({$valores})";
    }
    
    private function executarInstrucao()
    {
        $this->conexao();
        try {
            $this->Query->execute($this->Dados);
            $this->Resultado = $this->Conn->lastInsertId();
        } catch (Exception $ex) {
            $this->Resultado = null;
        }
    }
    
    private function conexao()
    {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Query);
    }
}

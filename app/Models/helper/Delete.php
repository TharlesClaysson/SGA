<?php

namespace App\Models\helper;

use PDO;
use Exception;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Delete extends Conn
{

    private $Tabela;
    private $Termos;
    private $Values;
    private $Resultado;
    private $Query;
    private $Conn;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function exeDelete($Tabela, $Termos, $ParseString)
    {
        $this->Tabela = (string) $Tabela;
        $this->Termos = (string) $Termos;
        parse_str($ParseString, $this->Values);

        $this->executarIntrucao();
    }

    private function executarIntrucao()
    {
        $this->Query = "DELETE FROM {$this->Tabela} {$this->Termos}";
        $this->conexao();
        try {
            $this->Query->execute($this->Values);
            $this->Resultado = true;
        } catch (Exception $ex) {
            $this->Resultado = false;
        }
    }

    private function conexao()
    {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Query);
    }

}

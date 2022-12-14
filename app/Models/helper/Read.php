<?php

namespace App\Models\helper;

use PDO;
use Exception;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Read extends Conn
{
    private $Select;
    private $Values;
    private $Resultado;
    private $Query;
    private $Conn;

    public function getResultado()
    {
        return $this->Resultado;
    }

    public function exeRead($Tabela, $Termos = null, $ParseString = null)
    {
        var_dump($ParseString);
        if (!empty($ParseString)) {
            parse_str($ParseString, $this->Values);
        }
        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
        $this->exeInstrucao();
    }

    public function fullRead($Query, $ParseString = null)
    {
        $this->Select = (string) $Query;
        if (!empty($ParseString)) {
            parse_str($ParseString, $this->Values);
        }

        $this->exeInstrucao();
    }

    private function exeInstrucao()
    {
        $this->conexao();
        try {
            $this->getIntrucao();
            $this->Query->execute();
            $this->Resultado = $this->Query->fetchAll();
        } catch (Exception $ex) {
            $this->Resultado = null;
        }
    }

    private function conexao()
    {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Select);
        $this->Query->setFetchMode(PDO::FETCH_ASSOC);
    }

    private function getIntrucao()
    {
        if ($this->Values) {
            foreach ($this->Values as $Link => $Valor) {
                if ($Link == 'limit' || $Link == 'offset') {
                    $Valor = (int) $Valor;
                }
                $this->Query->bindValue(":{$Link}", $Valor, (is_int($Valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
}

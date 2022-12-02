<?php

namespace App\Models;

if (!defined('URL')) {
    header("Location: " . URL);
    exit();
}

class Alunos
{
    private $Dados;
    private $Resultado;
    private $Foto;
    private $ResultadoList;
    private $Id;

    function getResultado()
    {
        return $this->Resultado;
    }
    //cadastrar anuncio
    public function cadastrar(array $Dados)
    {
        $this->Dados = $Dados;

        $cadAluno = new \App\Models\helper\Create();
        $cadAluno->exeCreate('alunos', $this->Dados);

        if ($cadAluno->getResultado()) {
            $this->Resultado = true;
        } else {
            $this->Resultado = false;
        }
    }
    //visualizar aluno
    public function visualizar($id)
    {
        $this->Id = $id;
        $visualisar = new \App\Models\helper\Read();
        $visualisar->fullRead("SELECT * FROM alunos WHERE id =:id", "id=" . $this->Id);
        $this->ResultadoList = $visualisar->getResultado();

        return $this->ResultadoList;
    }
    //excluir aluno
    public function excluir($id)
    {
        $this->Id = $id;
        $excluir = new \App\Models\helper\Delete();
        $excluir->exeDelete("alunos", "WHERE id =:id", "id={$this->Id}");
        if ($excluir->getResultado()) {
            $this->Resultado = true;
        } else {
            $this->Resultado = false;
        }
    }
    //alterar anuncio
    public function alterar(array $Dados)
    {
        $this->Dados = $Dados;
        $alterar = new \App\Models\helper\Update();


        $alterar->exeUpdate("alunos", $this->Dados, "WHERE id =:id", "id=" . $this->Dados['id']);
        if ($alterar->getResultado()) {
            $this->Resultado = true;
        } else {
            $this->Resultado = false;
        }
    }
    //listar alunos
    public function listar()
    {
        $listar = new \App\Models\helper\Read();
        $listar->fullRead("SELECT * FROM alunos");
        $this->ResultadoList = $listar->getResultado();
        return $this->ResultadoList;
    }
}

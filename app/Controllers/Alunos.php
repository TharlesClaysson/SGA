<?php

namespace App\Controllers;

if (!defined('URL')) {
    header("Location: " . URL);
    exit();
}

class Alunos
{

    private $Dados;
    private $Id;

    public function cadastrar()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['CadAluno'])) {
            unset($this->Dados['CadAluno']);

            $CadAluno = new \App\Models\Alunos();
            $CadAluno->cadastrar($this->Dados);
            if ($CadAluno->getResultado()) {
                $UrlDestino = URL . 'home/index';
                header("Location: $UrlDestino");
            } else {
                $this->Dados['form'] = $this->Dados;
                $carregarView = new \Core\ConfigView("Views/aluno/cadastrar", $this->Dados);
                $carregarView->renderizarUsuario();
            }
        } else {
            $carregarView = new \Core\ConfigView("Views/aluno/cadastrar", $this->Dados);
            $carregarView->renderizarUsuario();
        }
    }

    public function visualizar($id)
    {
        $this->Id = $id;
        $visualizarAluno = new \App\Models\Alunos();
        $this->Dados['visualizarAluno'] = $visualizarAluno->visualizar($this->Id);

        $carregarView = new \Core\ConfigView('Views/aluno/visualizar', $this->Dados);
        $carregarView->renderizarUsuario();
    }

    public function editar($id)
    {
        $this->Id = $id;
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['EditAluno'])) {
            unset($this->Dados['EditAluno']);
            $EditAluno = new \App\Models\Alunos();
            $EditAluno->alterar($this->Dados);
            if ($EditAluno->getResultado()) {
                $UrlDestino = URL . "home/index";
                header("Location: $UrlDestino");
            } else {
                $this->Dados['visualizarAluno'] = $this->Dados;
                $carregarView = new \Core\ConfigView('Views/aluno/editar', $this->Dados);
                $carregarView->renderizarUsuario();
            }
        } else {
            $visualizarAluno = new \App\Models\Alunos();
            $this->Dados['visualizarAluno'] = $visualizarAluno->visualizar($this->Id);

            $carregarView = new \Core\ConfigView('Views/aluno/editar', $this->Dados);
            $carregarView->renderizarUsuario();
        }
    }

    public function excluir($id)
    {
        $this->Id = $id;
        $excluir = new \App\Models\Alunos();
        $excluir->excluir($this->Id);
        $UrlDestino = URL . 'home/index';
        header("Location: $UrlDestino");
    }
}

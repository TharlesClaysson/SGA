<?php

namespace App\Controllers;

if (!defined('URL')) {
    header("Location: " . URL);
    exit();
}

class Usuarios
{

    private $Dados;
    private $Id;

    public function cadastrar()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['CadUsers'])) {
            unset($this->Dados['CadUsers']);

            $CadUsers = new \App\Models\Usuarios();
            $CadUsers->cadastrar($this->Dados);
            if ($CadUsers->getResultado()) {
                $UrlDestino = URL . 'usuarios/listar';
                header("Location: $UrlDestino");
            }
        } else {
            $carregarView = new \Core\ConfigView("Views/usuario/cadastrar", $this->Dados);
            $carregarView->renderizarUsuario();
        }
    }

    public function editar($id)
    {
        $this->Id = $id;
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['EditUsers'])) {
            unset($this->Dados['EditUsers']);
            $EditUsers = new \App\Models\Usuarios();
            $EditUsers->alterar($this->Dados);
            if ($EditUsers->getResultado()) {
                $UrlDestino = URL . "usuarios/listar";
                header("Location: $UrlDestino");
            } else {
                $this->Dados['visualizarUser'] = $this->Dados;
                $carregarView = new \Core\ConfigView('Views/usuario/editar', $this->Dados);
                $carregarView->renderizarUsuario();
            }
        } else {
            $visualizarUser = new \App\Models\Usuarios();
            $this->Dados['visualizarUser'] = $visualizarUser->visualizar($this->Id);

            $carregarView = new \Core\ConfigView('Views/usuario/editar', $this->Dados);
            $carregarView->renderizarUsuario();
        }
    }

    public function excluir($id)
    {
        $this->Id = $id;
        $excluir = new \App\Models\Usuarios();
        $excluir->excluir($this->Id);
        $UrlDestino = URL . 'usuarios/listar';
        header("Location: $UrlDestino");
    }

    public function listar()
    {
        $listAlunos = new \App\Models\Usuarios();
        $this->Dados['listUsers'] = $listAlunos->listar();

        $carregarView = new \Core\ConfigView('Views/usuario/listar', $this->Dados);
        $carregarView->renderizarUsuario();
    }
}



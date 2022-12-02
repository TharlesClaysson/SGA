<?php

namespace App\Controllers;

if (!isset($_SESSION['usuario_id'])) {
    header("Location: " . URL);
    exit();
} elseif (!defined('URL')) {
    header("Location: " . URL);
    exit();
}

class Home
{
    public function index()
    {
        $listAlunos = new \App\Models\Alunos();
        $this->Dados['listAlunos'] = $listAlunos->listar();

        $carregarView = new \Core\ConfigView('Views/home/home', $this->Dados);
        $carregarView->renderizarUsuario();
    }
}

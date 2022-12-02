<?php

namespace App\Controllers;

if (!defined('URL')) {
    header("Location: " . URL);
    exit();
}

class Login
{

    private $Dados;

    public function login()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['SendLogin'])) {
            unset($this->Dados['SendLogin']);
            $visualLogin = new \App\Models\Usuarios();
            $visualLogin->acesso($this->Dados);
            if ($visualLogin->getResultado()) {
                $UrlDestino = URL . 'home/index';
                header("Location: $UrlDestino");
            } else {
                $this->Dados['form'] = $this->Dados;
            }
        }
        $carregarView = new \Core\ConfigView("Views/usuario/logar", $this->Dados);
        $carregarView->renderizarLogin();
    }
}

<?php

namespace Core;

class ConfigView
{
    private $Nome;
    private $Dados;

    public function __construct($Nome, array $Dados = null)
    {
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
    }


    public function renderizarLogin()
    {
        include 'app/Views/include/cabecalho.php';
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/' . $this->Nome . '.php';
        } else {
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
    }

    public function renderizarUsuario()
    {
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/Views/include/cabecalho.php';
            include 'app/Views/include/menuUsuario.php';
            include 'app/' . $this->Nome . '.php';
            include 'app/Views/include/rodape.php';
        } else {
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
    }
}

<?php

namespace App\Controllers;

if (!defined('URL')) {
    header("Location: " . URL);
    exit();
}

class DeslogarUsuario
{


    public function deslogarUsuario()
    {
        unset(
            $_SESSION['usuario_id'],
            $_SESSION['usuario_nome'],
            $_SESSION['usuario_email'],
            $_SESSION['adm']
        );

        $UrlDestino = URL . 'login/login';
        header("Location: $UrlDestino");
    }
}

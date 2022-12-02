<?php

namespace App\Models;

if (!defined('URL')) {
    header("Location: " . URL);
    exit();
}

class Usuarios
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
    public function cadastrar(array $Dados)
    {
        $this->Dados = $Dados;
        $cadUser = new \App\Models\helper\Create();
        $cadUser->exeCreate('usuario', $this->Dados);
        if ($cadUser->getResultado()) {
            $this->Resultado = true;
        } else {
            $this->Resultado = false;
        }
    }
    public function visualizar($id)
    {
        $this->Id = $id;
        $visualisar = new \App\Models\helper\Read();
        $visualisar->fullRead("SELECT * FROM usuario WHERE idusuario =:id", "id=" . $this->Id);
        $this->ResultadoList = $visualisar->getResultado();

        return $this->ResultadoList;
    }
    public function excluir($id)
    {
        $this->Id = $id;
        $excluir = new \App\Models\helper\Delete();
        $excluir->exeDelete("usuario", "WHERE idusuario =:id", "id={$this->Id}");
        if ($excluir->getResultado()) {
            $this->Resultado = true;
        } else {
            $this->Resultado = false;
        }
    }
    public function alterar(array $Dados)
    {
        $this->Dados = $Dados;
        $alterar = new \App\Models\helper\Update();

        $alterar->exeUpdate("usuario", $this->Dados, "WHERE idusuario =:id", "id=" . $this->Dados['idusuario']);
        if ($alterar->getResultado()) {
            $this->Resultado = true;
        } else {
            $this->Resultado = false;
        }
    }
    public function listar()
    {
        $listar = new \App\Models\helper\Read();
        $listar->fullRead("SELECT * FROM usuario");
        $this->ResultadoList = $listar->getResultado();
        return $this->ResultadoList;
    }

    public function acesso(array $Dados)
    {
        $this->Dados = $Dados;

        $valEmail = new \App\Models\helper\Email();
        $valEmail->valEmail($this->Dados['email']);
        if ($valEmail->getResultado()) {
            $this->Resultado = true;
        } else {
            $this->Resultado = false;
        }

        if ($this->Resultado) {
            $validaLogin = new \App\Models\helper\Read();
            $validaLogin->fullRead("SELECT * FROM usuario WHERE email =:email LIMIT :limit", "email={$this->Dados['email']}&limit=1");
            $this->Resultado = $validaLogin->getResultado();
            if (!empty($this->Resultado)) {

                // if (password_verify($this->Dados['senha'], $this->Resultado[0]['senha'])) {
                if ($this->Dados['senha'] == $this->Resultado[0]['senha']) {
                    $_SESSION['usuario_id'] = $this->Resultado[0]['idusuario'];
                    $_SESSION['usuario_nome'] = $this->Resultado[0]['nome'];
                    $_SESSION['usuario_email'] = $this->Resultado[0]['email'];
                    $_SESSION['adm'] = $this->Resultado[0]['adm'];
                    $this->Resultado = true;
                } else {
                    $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Email ou a Senha incorreto!</div>";
                    $this->Resultado = false;
                }
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Usuario não encontrado</div>";
                $this->Resultado = false;
            }
        }
    }
}

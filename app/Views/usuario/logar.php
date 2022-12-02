<?php
if (isset($_SESSION['usuarioid'])) {
    header("Location: " . URL . 'home/index');
    exit();
} elseif (!defined('URL')) {
    header("Location: " . URL);
    exit();
}
?>
<header>
    <h1 class="text-center" style="font-family:Roboto"><b>Logar</b></h1>
    <hr style="height: 1px; color: black; background-color: black;">

    <form role="form" action="" method="post">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        if (isset($this->Dados['form'])) {
            $valorForm = $this->Dados['form'];
        }
        ?>
        <div class="form-group">
            <div class="col-md-4 offset-md-4">
                <br>
                <label for="email" class="form-label"><b>Email:</b></label>
                <input type="text" class="form-control" name="email" required placeholder="Digite o seu email" value="<?php if (isset($valorForm['email'])) {
                                                                                                                                echo $valorForm['email'];
                                                                                                                            } ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 offset-md-4">
                <br>
                <div class="mb-3">
                    <label for="senha" class="form-label"><b>Senha:</b></label>
                    <input type="password" class="form-control" required name="senha" placeholder="Digite a sua senha">
                </div>
            </div>
            <div>

                <div class="form-group">
                    <div class="col-md-4 offset-md-4">
                        <br>
                        <a><input type="submit" value="Acessar" class="btn btn-primary" name="SendLogin"></a>
                    </div>
                </div>
    </form>
</header>
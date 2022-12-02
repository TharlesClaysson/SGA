<?php
if (!isset($_SESSION['usuario_id'])) {
    header("Location: " . URL);
    exit();
} elseif (!defined('URL')) {
    header("Location: " . URL);
    exit();
} elseif ($_SESSION['adm'] == 0) {
    header("Location: " . URL);
    exit();
}

extract($this->Dados['visualizarUser'][0]);
$nomeUsuario = explode(" ", $nome);
$prim_nome = $nomeUsuario[0];
?>

<div class="content p-1">
    <div class="list-group-item">
        <div class="position-relative d-flex">
            <div class="position-relative top-0 start-0 mr-auto p-2">
                <span class="d-none d-md-block">
                    <?php
                    echo "<a href='" . URL . "usuarios/listar' class='btn btn-outline-info btn-sm'>Listar</a> ";
                    ?>
                </span>
            </div>
        </div>
        <h1 class="text-center" style="font-family:Roboto"><b><?php echo $prim_nome; ?></b></h1>
        <hr style="height: 1px; color: black; background-color: black;">
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
            <div class="form-group">
                <div class="col-md-4 offset-md-4">
                    <br>
                    <label for="nome">Nome completo</b></label>
                    <input type="text" class="form-control" name="nome" required value="<?php echo $nome; ?>"></input>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 offset-md-4">
                    <br>
                    <label for="email">Email</b></label>
                    <input type="text" class="form-control" name="email" required value="<?php echo $email; ?>"></input>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 offset-md-4">
                    <br>
                    <label for="senha"><span class="text-danger">*</span>Senha</b></label>
                    <input type="password" class="form-control" name="senha" required></input>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 offset-md-4">
                    <br>
                    <label for="adm"><span class="text-danger">*</span>Nivel administrativo</b></label>
                    <input type="number" min="0" max="1" class="form-control" name="adm" required placeholder="0 normal / 1 adimistrador" value="<?php echo $adm; ?>"></input>
                </div>
            </div>
            <p><span class="text-danger">* </span>Campo obrigatório</p>
            <input name="EditUsers" type="submit" class="btn btn-warning" value="Salvar">
        </form>
    </div>
</div>
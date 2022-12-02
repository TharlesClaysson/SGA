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
?>

<header>
    <h1 class="text-center" style="font-family:Roboto"><b>Cadastrar Usuario</b></h1>
    <hr style="height: 1px; color: black; background-color: black;">

    <form role="form" action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <div class="col-md-4 offset-md-4">
                <br>
                <label for="nome"><span class="text-danger">*</span>Nome completo</b></label>
                <input type="text" class="form-control" name="nome" required></input>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 offset-md-4">
                <br>
                <label for="email"><span class="text-danger">*</span>Email</b></label>
                <input type="text" class="form-control" name="email" required></input>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 offset-md-4">
                <br>
                <label for="adm"><span class="text-danger">*</span>Nivel administrativo</b></label>
                <input type="number" min="0" max="1" class="form-control" name="adm" required placeholder="0 normal / 1 adimistrador"></input>
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
                <a> <input name="CadUsers" type="submit" class="btn btn-lg btn-success btn-block" value="Cadastrar"></a>
                <a href="<?php echo URL . 'usuarios/listar'; ?>"><button type="button" class="btn btn-lg btn-danger btn-block">Cancelar</button></a>
            </div>
        </div>
    </form>
</header>


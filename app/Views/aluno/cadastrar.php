<?php
if (!isset($_SESSION['usuario_id'])) {
    header("Location: " . URL);
    exit();
} elseif (!defined('URL')) {
    header("Location: " . URL);
    exit();
}
?>

<header>
    <h1 class="text-center" style="font-family:Roboto"><b>Cadastrar aluno</b></h1>
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
                <label for="telefone"><span class="text-danger">*</span>Telefone de contato</b></label>
                <input type="text" class="form-control" name="telefone" required></input>
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
                <label for="ano"><span class="text-danger">*</span>Ano</b></label>
                <input type="text" class="form-control" name="ano" required></input>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 offset-md-4">
                <br>
                <a> <input name="CadAluno" type="submit" class="btn btn-lg btn-success btn-block" value="Cadastrar"></a>
                <a href="<?php echo URL . 'home/index'; ?>"><button type="button" class="btn btn-lg btn-danger btn-block">Cancelar</button></a>
            </div>
        </div>
    </form>
</header>
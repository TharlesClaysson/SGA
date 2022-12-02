<?php
if (!isset($_SESSION['usuario_id'])) {
    header("Location: " . URL);
    exit();
} elseif (!defined('URL')) {
    header("Location: " . URL);
    exit();
}

extract($this->Dados['visualizarAluno'][0]);
$nomeAluno = explode(" ", $nome);
$prim_nome = $nomeAluno[0];
?>

<div class="content p-1">
    <div class="list-group-item">
        <div class="position-relative d-flex">
            <div class="position-relative top-0 start-0 mr-auto p-2">
                <span class="d-none d-md-block">
                    <?php
                    echo "<a href='" . URL . "home/index' class='btn btn-outline-info btn-sm'>Listar</a> ";
                    ?>
                </span>
            </div>
        </div>
            <h1 class="text-center" style="font-family:Roboto"><b><?php echo $prim_nome; ?></b></h1>
            <hr style="height: 1px; color: black; background-color: black;">
                <div class="form-group">
                    <div class="col-md-4 offset-md-4">
                        <br>
                        <label for="nome">Nome completo</b></label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>"></input>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 offset-md-4">
                        <br>
                        <label for="telefone">Telefone de contato</b></label>
                        <input type="text" class="form-control" name="telefone" value="<?php echo $telefone; ?>"></input>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 offset-md-4">
                        <br>
                        <label for="email">Email</b></label>
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>"></input>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 offset-md-4">
                        <br>
                        <label for="ano">Ano</b></label>
                        <input type="text" class="form-control" name="ano" value="<?php echo $ano; ?>"></input>
                    </div>
                </div>
            </form>
        </dl>
    </div>
</div>
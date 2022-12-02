<?php
if (!isset($_SESSION['usuario_id'])) {
    header("Location: " . URL);
    exit();
} elseif (!defined('URL')) {
    header("Location: " . URL);
    exit();
}

if ($this->Dados['listAlunos'] != null) {
?>
    <div class="princ">
        <h1>Lista de alunos</h1>
        <a href="<?php echo URL . 'alunos/cadastrar'; ?>"><button class="btn-cadastro">Cadastrar Novo Aluno</button></a>
        <div class="table-div">
            <table>
                <thead class="titulos-tabe">
                    <tr class="tr-titulo">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Curso</th>
                    </tr>
                </thead>
                <tbody class="corpo-table">
                    <?php
                    $i = 0;
                    foreach ($this->Dados['listAlunos'] as $alunonos) {
                        $i++;
                        extract($alunonos);
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $ano; ?></td>
                            <td>
                                <?php if ($_SESSION['adm'] == 1) {
                                    echo "<a href='" . URL . "alunos/editar/" . $id . "'><button class='btnEdit'>Editar</button></a><br>";
                                    echo "<a href='" . URL . "alunos/excluir/" . $id . "'><button class='btnDelete'>Deletar</button></a><br>";
                                    echo "<a href='" . URL . "alunos/visualizar/" . $id . "'><button class='btnEdit'>Visualizar</button></a>";
                                } else {
                                    echo "<a href='" . URL . "alunos/visualizar/" . $id . "'><button class='btnEdit'>Visualizar</button></a>";
                                }

                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
} else {
?>
    <div class="princ">
        <h1>Lista de alunos</h1>
        <a href="<?php echo URL . 'alunos/cadastrar'; ?>"><button class="btn-cadastro">Cadastrar Novo Aluno</button></a>
        <div class="table-div">
            <table>
                <thead class="titulos-tabe">
                    <tr class="tr-titulo">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Curso</th>
                    </tr>
                </thead>
                <tbody class="corpo-table">
                </tbody>
            </table>
        </div>
    </div>
<?php
}
?>
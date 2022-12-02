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
if ($this->Dados['listUsers'] != null) {
?>
    <div class="princ">
        <h1>Lista de usuarios</h1>
        <div class="table-div">
            <table>
                <thead class="titulos-tabe">
                    <tr class="tr-titulo">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Admim</th>
                    </tr>
                </thead>
                <tbody class="corpo-table">
                    <?php
                    $i = 0;
                    foreach ($this->Dados['listUsers'] as $user) {
                        $i++;
                        extract($user);
                    ?>
                        <tr>
                            <td><?php echo $idusuario; ?></td>
                            <td><?php echo $nome; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $adm; ?></td>
                            <td>
                                <?php 
                                echo "<a href='" . URL . "usuarios/editar/" . $idusuario . "'><button class='btnEdit'>Editar</button></a><br>";
                                echo "<a href='" . URL . "usuarios/excluir/" . $idusuario . "'><button class='btnDelete'>Deletar</button></a><br>";
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
        <h1>Lista de usuarios</h1>
        <div class="table-div">
            <table>
                <thead class="titulos-tabe">
                    <tr class="tr-titulo">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Admim</th>
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
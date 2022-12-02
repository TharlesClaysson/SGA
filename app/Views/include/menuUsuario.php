<header>
    <nav class="navbar navbar-light" style="background-color: #a94fff">
        <div class="container-fluid position-relative">
            <di class="">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </di>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link menu-header">
                                        <?php if (isset($_SESSION['usuario_imagem']) and (!empty($_SESSION['usuario_imagem']))) { ?>
                                            <img class="rounded-circle" src="<?php echo URL . 'assets/usuario/imagem/' . $_SESSION['usuario_id'] . '/' . $_SESSION['usuario_imagem']; ?>" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline">
                                            <?php } else { ?>
                                                <img class="rounded-circle" src="<?php echo URL . 'assets/usuario/icone_usuario.png'; ?>" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline">
                                                <?php
                                            }
                                            $nome = explode(" ", $_SESSION['usuario_nome']);
                                            $prim_nome = $nome[0];
                                            echo $prim_nome;
                                                ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <a href="<?php echo URL . 'home/index'; ?>"><button><b>Home</b></button></a>
                    <br>
                    <br>
                    <?php if ($_SESSION['adm'] == 1) { ?>
                        <div class="dropdown">
                            <button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Administrador
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo URL . 'usuarios/listar'; ?>">Listar Usuarios</a></li>
                                <li><a class="dropdown-item" href="<?php echo URL . 'usuarios/cadastrar'; ?>">Cadastrar usuario</a></li>
                            </ul>
                        </div>
                    <?php } else {
                        echo "";
                    } ?>
                    <br>
                    <br>
                    <a href="<?php echo URL . 'deslogar_usuario/deslogar_usuario'; ?>"><button><b>Sair</b></button></a>
                </div>
            </div>
        </div>
    </nav>
    </div>
</header>
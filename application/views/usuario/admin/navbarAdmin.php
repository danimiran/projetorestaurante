<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3 class="my-1 ml-4"><img src="<?= base_url('img/logotipo1.png') ?>" width="150"></h3>
            <strong><img src="<?= base_url('img/img/icone.png') ?>" width="40"></strong>
        </div>
        <ul class="list-unstyled components">
            <li class="">
                <a href="<?= base_url('index.php/admin') ?>" class="action">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#cardaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-utensils"></i>
                    Cardápio
                </a>
                <ul class="collapse list-unstyled" id="cardaSubmenu">
                    <li>
                        <a href="<?= base_url('index.php/cardapio/cadastro') ?>">Cadastro de Pratos</a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/cardapio') ?>">Lista de Pratos</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="<?= base_url('index.php/categoria/gerenciar') ?>">
                    <i class="fas fa-tags"></i>
                    Categoria
                </a>
            </li>
            <li>
                <a href="#comandaMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-concierge-bell"></i>
                    Comanda
                </a>
                <ul class="collapse list-unstyled" id="comandaMenu">
                    <li>
                        <a href="<?= base_url('index.php/pedidos/adiciona') ?>">Cadastro de Comanda</a>
                    </li>
                    <li>
                        <a href="<?= base_url('index.php/pedidos') ?>">Lista de Comanda</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url('index.php/contato/lista') ?>">
                    <i class="fas fa-comments"></i>
                    Contato
                </a>

            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-light">
            <button type="button" id="sidebarCollapse" class="btn text-white" style="background-color:#426D44">
                <i class="fas fa-align-left"></i>
                <span>Menu</span>
            </button>
            <div class="d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0"> </div>
            <ul class="navbar-nav ml-auto ml-md-0 ">
                <li class="nav-item dropdown no-arrow icone">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user "></i> Olá Administrador<i class="fas  ml-1 fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('index.php/admin/logout') ?>">Sair
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
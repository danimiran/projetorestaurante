<nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background: rgba(0,0,0,0.8);">
    <a class="navbar-brand ml-2" data-toggle="modal" data-target="#modalLoginForm">
        <img src="<?= base_url('img/logotipo1.png') ?>" alt="logo" width="60">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <div class="col-md-8"> </div>
        <ul id="nav" class="navbar-nav">
            <li class="nav-item">
                <a href="<?= base_url('index.php') ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('index.php/categoria/') ?>" class="nav-link">Cardápio</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('index.php/home/galeria') ?>" class="nav-link">Galeria</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('index.php/contato') ?>" class="nav-link">Contato</a>
            </li>
        </ul>
    </div>
</nav>
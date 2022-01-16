<div class="container mb-5">
    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <form method="POST" enctype="multipart/form-data" class="text-dark">
        <h1 class="text-center ">Cadastro de Prato</h1>
        <div class="text-right">
            <a href="<?= base_url('index.php/cardapio') ?>" class="btn btn-rounded mb-4 text-white" style="background-color:#426D44">
                <i class="fas fa-list"></i> Lista de Cardápio</a>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto my-4">
                <?= $conteudo ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12  text-right">
                <input type="submit" value="SALVAR" class="btn btn-dark col-md-3">
            </div>
        </div>
    </form>
</div>
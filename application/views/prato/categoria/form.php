<div class="container">
    <h2 class="text-center">Gerenciamento de Categoria</h2><br>
    <div class="text-right">
        <a href="<?= base_url('index.php/categoria/gerenciar') ?>" class="btn  btn-rounded mb-4 text-white"  style="background-color:#426D44">
            <i class="fas fa-list"></i> Lista de Categoria</a>
    </div>
    <form class="card col-md-12 p-5" method="POST">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <h3 class="mx-auto mt-3 ">Cadastro de Categoria</h3>
        <p class="text-center mt-0 text-muted">Obs: As categorias cadastradas aparecem na página cardápio </p>
        <input required value="<?= set_value('categoria[nome_categoria]') ?><?= isset($categoria) ? $categoria['nome_categoria'] : '' ?>" type="text" name="categoria[nome_categoria]" class="form-control mx-auto my-4 col-md-6" placeholder="Nome da Categoria">
        <button class="btn text-white col-md-6 mx-auto mb-5" style="background-color:#426D44">Cadastrar</button>
    </form>
</div>
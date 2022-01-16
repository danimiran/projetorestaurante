<div class="container">
    <h5 class="card-header  py-1"  style="background-color:#426D44">
        <p class=" text-light mb-0">Comanda</p>
    </h5>
    <form method="POST" class=" border borde-light p-5" >
        <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
        <div class="form-row mb-4">
            <div class="col-md-8">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="comanda[nome]" value="<?=set_value('comanda[nome]')?><?= isset($comanda) ? $comanda['nome'] : ''  ?>" 
                class="form-control mb-2" placeholder="Nome do Cliente">
            </div>
            <div class="col-md-4">
                <label for="mesa">Mesa</label>
                <input required type="number" id="mesa" name="comanda[mesa]" value="<?=set_value('comanda[mesa]')?><?= isset($comanda) ? $comanda['mesa'] : ''  ?>" 
                class="form-control mb-2" placeholder="Mesa" min="1" max="15">
            </div>
        </div>

        <div class="text-center">
            <button class="btn h6-responsive text-white" type="submit" style="background-color:#426D44"> <i class="fas fa-share"></i> Salvar</button>
        </div>
    </form>
</div>
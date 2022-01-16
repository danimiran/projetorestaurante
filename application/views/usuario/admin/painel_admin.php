<div class="container my-4">

    <div class="border mb-3">
        <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Levantamento do Sistema</div>
        <div class="card-body col-md-10 mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="border mb-3 text-center" style="max-width: 30rem; ">
                        <div class="card-header text-white"  style="background-color:#426D49">Cardápio</div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $cardapio ?></h5>
                                <i class="">Pratos cadastrados</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border mb-3 text-center" style="max-width: 30rem;">
                        <div class="card-header text-white" style="background-color:#426D49">Categorias</div>
                        <div class="card-body">
                            <h4 class="card-title"> <?= $categoria ?></h5>
                                <i class="">Categorias cadastradas</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="border mb-3 text-center" style="max-width: 30rem;">
                        <div class="card-header text-white"  style="background-color:#426D49">Contato</div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $contato ?></h5>
                                <i class="">Contatos</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border mb-3 text-center" style="max-width: 30rem;">
                        <div class="card-header text-white" style="background-color:#426D49">Comandas</div>
                        <div class="card-body">
                            <h4 class="card-title"> <?= $comanda ?></h5>
                                <i class="">Comandas cadastradas</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
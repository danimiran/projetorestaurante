<div class="container my-4">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="faturamento-tab" data-toggle="tab"
             href="#faturamento" role="tab" aria-controls="faturamento" aria-selected="true">Faturamento
            </a>
            <a class="nav-item nav-link" id="venda-tab" data-toggle="tab" href="#venda" role="tab" aria-controls="venda"
             aria-selected="false">Vendas
            </a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="faturamento" role="tabpanel" aria-labelledby="faturamento-tab">
            <div class="border mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Faturamento de <u class="h6"><?= date("Y") ?></u></div>
                <div class="card-body col-md-11 mx-auto">
                    <div class="card-body table-responsive">
                        <?= $faturamento ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="venda" role="tabpanel" aria-labelledby="venda-tab">
            <div class="border mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    Vendas de <u class="h6"><?= date("Y") ?></u></div>
                <div class="card-body col-md-11 mx-auto">
                    <div class="card-body table-responsive">
                        <?= $venda ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
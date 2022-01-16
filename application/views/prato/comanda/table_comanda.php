<div class="container my-4">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="home-tab" data-toggle="tab" href="#hoje" role="tab" aria-controls="hoje" aria-selected="true">Comandas de Hoje
            </a>
            <a class="nav-item nav-link" id="lista-tab" data-toggle="tab" href="#lista" role="tab" aria-controls="lista" aria-selected="false">Lista de Comandas
            </a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="hoje" role="tabpanel" aria-labelledby="hoje-tab">
            <div class="border mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Lista de Hoje
                </div>
                <div class="mx-auto">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Nome</th>
                                    <th>Mesa</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody> <?= $tabela ?> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="lista" role="tabpanel" aria-labelledby="lista-tab">
            <div class="border mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Todas as Comandas
                </div>
                <div class=" mx-auto">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-sm" id="tabela" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Nome</th>
                                    <th>Mesa</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody> <?= $lista_geral ?> </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
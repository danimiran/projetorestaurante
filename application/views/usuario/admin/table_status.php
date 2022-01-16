<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="border mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Comandas em <b><u>aberto</u></b> de <?= date('d/m/Y') ?></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="table" width="100%" cellspacing="0">
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
    </div>
</div>



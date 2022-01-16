<div class="container">
    <div class="text-right">
        <a href="<?= base_url('index.php/cardapio') ?>" class="btn btn-rounded mb-4 text-white"  style="background-color:#426D44">
            <i class="fas fa-list"></i> Lista de Pratos</a>
    </div>

    <div class="container pl-0 pr-0">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Informações do Produto
        </div>
    </div>
    <table class="table table-bordered table-sm table-hover tabela">
        <tbody>
            <tr>
                <td colspan="2" class="text-center"><strong>Foto</strong></td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">
                    <img src="<?= base_url('uploads/prato/' . $produto['foto']) ?>" class="img-fluid mx-auto" alt="" width="180">
                </td>
            </tr>

            <tr>
                <td class="text-center"><strong>Nome</strong></td>
                <td>
                    <?= $produto['nome'] ?>
                </td>
            </tr>
            <tr>
                <td class="text-center"><strong>Descrição</strong></td>
                <td>
                    <?= $produto['descricao'] ?>
                </td>
            </tr>
            <tr>
                <td class="text-center"><strong>Categoria</strong></td>
                <td>
                    <?= $produto['nome_categoria'] ?> (<?= $produto['categoria'] ?>)
                </td>
            </tr>
            <tr>
                <td class="text-center"><strong>Preço</strong></td>
                <td>
                    R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                </td>
            </tr>

        </tbody>
    </table>
</div>
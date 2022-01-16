<div class="container">
    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <h5 class="card-header  py-1"  style="background-color:#426D44">
        <p class=" text-light mb-0">Itens do Pedido</p>
    </h5>
    <form method="POST" class="border grey lighten-3 borde-light p-3">

        <div class="form-row mb-4 mx-auto">
            <input type="hidden" name="itemPedido[subtotal]">
            <div class="col-md-4">
                <label for="produto">Produto</label>
                <input type="text" id="produto" name="itemPedido[nome_produto]" class=" form-control mb-2 " placeholder="Nome do Produto">
            </div>
            <div class="col-md-2">
                <label for="produto">Produto</label>
                <input type="text" id="preco" name="itemPedido[preco]" class="form-control mb-2 preco" placeholder="0.00">
            </div>
            <div class="col-md-2">
                <label for="quantidade">Quantidade</label>
                <input type="number" id="quantidade" name="itemPedido[quantidade]" class="form-control mb-2" min="1" max="15">
            </div>
            <input type="hidden" name="itemPedido[cardapio_id]" id="idProduto">
            <input type="hidden" name="itemPedido[comanda_id]" id="idComanda" value="<?= isset($comanda) ? $comanda['id'] : ''  ?>">
            <div class="col-md-3 mt-4 text-center">
                <button class="btn text-white h6-responsive"  style="background-color:#426D44" type="submit"> <i class="fas fa-plus"></i> Adicionar</button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">
    $("#produto").autocomplete({
        source: "<?php echo base_url(); ?>index.php/itens/autoCompleteProduto",
        minLength: 1,
        select: function(event, ui) {
            $("#idProduto").val(ui.item.id);
            $("#preco").val(ui.item.preco);
            $("#quantidade").focus();
        }
    });
</script>
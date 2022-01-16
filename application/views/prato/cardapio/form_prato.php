<div class="form-row mb-4">
    <div class="col-md-6">
        <label for="nome" class="lead">Nome</label>
        <input required type="text" value="<?= set_value('cardapio[nome]') ?><?= isset($prato) ? $prato['nome'] : ''  ?>" name="cardapio[nome]" class="form-control" placeholder="Nome do Prato">

    </div>
    <div class="col-md-6 mb-4">
        <label for="categoria" class="lead">Categoria</label>
        <select required class="browser-default custom-select" value="<?= isset($prato) ? $prato['categoria'] : ''  ?>" id="categoria" name="cardapio[categoria]">
            <option value="" disabled selected>Selecione a categoria</option>
            <?= $selecao_categoria ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="descricao" class="lead">Descrição</label>
    <textarea required class="form-control rounded-0" name="cardapio[descricao]" placeholder="Descrição do Prato" rows="3"><?= set_value('cardapio[descricao]') ?> <?= isset($prato) ? $prato['descricao'] : '' ?></textarea>
</div>

<label class="lead" for="preco">Preço</label>
<div class="input-group mb-2">
    <div class="input-group-prepend">
        <div class="input-group-text">R$</div>
    </div>
    <input required type="text" value="<?= set_value('cardapio[preco]') ?><?= isset($prato) ? $prato['preco'] : ''  ?>" class="form-control col-md-3 preco" id="preco" name="cardapio[preco]" placeholder="00,00">
</div>
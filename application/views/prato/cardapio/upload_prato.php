<div class="form-group">
    <label for="foto" class="lead">Foto do Prato</label>
    <input  type="file" name="foto" class="form-control" value="<?= set_value('foto') ?><?= isset($prato) ? $prato['foto'] : '' ?>" placeholder="Selecione uma imagem">
</div>
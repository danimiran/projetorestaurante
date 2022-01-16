<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Login</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= base_url('index.php/admin/login_sessao') ?>">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <div class="modal-body mx-3">
          <div class="md-form mb-5">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="email" name="email" class="form-control validate" placeholder="E-mail">
          </div>

          <div class="md-form mb-4">
            <i class="fas fa-lock prefix grey-text"></i>
            <input type="password" name="senha" class="form-control validate" placeholder="Senha">
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="submit" class="btn text-white"  style="background-color: #01DFA5">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
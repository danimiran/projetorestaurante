<div class="container my-3">
  <div class="row mt-5">
    <div class="col-md-5 mx-auto">
      <div class="container pl-0 pr-0">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Mensagem
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><a><?= $contato['nome'] ?></a></h4>
          <hr />
          <p class="card-text"><i class="fas fa-at"></i> <?= $contato['email'] ?></p>
          <p><i class="far fa-envelope"></i> <?= $contato['assunto'] ?></p>
          <p><i class="fas fa-quote-left"></i> <?= $contato['mensagem'] ?></p>
          <a href="<?= base_url('index.php/contato/lista') ?>" class=" d-flex justify-content-end">
            <h5>Voltar <i class="fas fa-angle-double-right"></i></h5>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card card-componente">
  
  <?php if(isset($_SESSION['msg'])): ?>
        <div class="text-center alert alert-warning alert-dismissible fade show">
            <strong><?= $_SESSION['msg'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

  <?php unset($_SESSION['msg']) ?>

  <div class="card-body">
    <h5 class="card-title text-center">Bem-Vindo, escolha uma ação</h5>
    <div>
      <div class="row p-1">
        <div class="col-sm-12 text-center">
          <a href="/xml" class="btn btn-dark btn-home">Consumir XML</a>
        </div>
      </div>
      <div class="row p-1">
        <div class="col-sm-12 text-center">
          <a href="/insert_form" class="btn btn-dark btn-home">Inserir Torcedores</a>
        </div>
      </div>
      <div class="row p-1">
        <div class="col-sm-12 text-center">
          <a href="/select" class="btn btn-dark btn-home">Atualizar Dados</a>
        </div>
      </div>
      <div class="row p-1">
        <div class="col-sm-12 text-center">
          <a href="/email" class="btn btn-dark btn-home">Disparar E-mails</a>
        </div>
      </div>
    </div>
  </div>
</div>
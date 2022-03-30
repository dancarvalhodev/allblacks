<hr class="separador">
<hr class="separador">

<?php if(isset($_SESSION['msg'])): ?>
    <div class="text-center alert alert-warning alert-dismissible fade show">
        <strong><?= $_SESSION['msg'] ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php unset($_SESSION['msg']) ?>

<hr class="separador">
<hr class="separador">

<div class="row p-1">
  <div class="col-sm-12 text-center">
    <a href="/xml" class="btn btn-info">Consumir XML</a>
  </div>
</div>

<div class="row p-1">
  <div class="col-sm-12 text-center">
    <a href="/insert" class="btn btn-info">Inserir Torcedores</a>
  </div>
</div>

<div class="row p-1">
  <div class="col-sm-12 text-center">
    <a href="/select" class="btn btn-info">Atualizar Dados de Torcedores</a>
  </div>
</div>
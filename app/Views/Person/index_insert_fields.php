<div class="card card-componente_2">
  <div class="card-body">
    <h5 class="card-title text-center">Atualização de Torcedor</h5>
    <div>
      <form class="row g-3" action="/update" method="post">
        <div class="mb-3">
          <label for="telefone" class="form-label">Telefone</label>
          <input required type="text" class="form-control" id="telefone2" name="telefone">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input required type="email" class="form-control" id="email" name="email">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary mb-3">Atualizar</button>
        </div>
      </form>
      <hr>
      <div class="row text-center">
        <div class="col-sm-12 ">
          <a class="btn btn-warning" href="/">Voltar</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card card-componente">
  <div class="card-body">
    <h5 class="card-title text-center">Envio de XML</h5>
    <div>
      <form class="row g-3" enctype="multipart/form-data" action="/xml/upload" method="post">
        <div class="mb-3 text-center">
          <label for="formFile" class="form-label">Escolha o XML</label>
          <input name="xmlFile" class="form-control" type="file" id="formFile">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary mb-3">Enviar XML</button>
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
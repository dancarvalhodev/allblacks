<div class="card card-componente_2">
  <div class="card-body">
    <h5 class="card-title text-center">Envio de XML</h5>
    <div>
      <form class="row g-3" action="/insert" method="post">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input required type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="mb-3">
          <label for="documento" class="form-label">Documento</label>
          <input required type="text" class="form-control" id="documento" name="documento">
        </div>
        <div class="mb-3">
          <label for="cep" class="form-label">CEP</label>
          <input required type="text" class="form-control" id="cep" name="cep">
        </div>
        <div class="mb-3">
          <label for="endereco" class="form-label">Endereço</label>
          <input required type="text" class="form-control" id="endereco" name="endereco">
        </div>
        <div class="mb-3">
          <label for="bairro" class="form-label">Bairro</label>
          <input required type="text" class="form-control" id="bairro" name="bairro">
        </div>
        <div class="mb-3">
          <label for="cidade" class="form-label">Cidade</label>
          <input required type="text" class="form-control" id="cidade" name="cidade">
        </div>
        <div class="mb-3">
          <label for="uf" class="form-label">UF</label>
          <input required type="text" class="form-control" id="uf" name="uf">
        </div>
        <div class="mb-3">
          <label for="telefone" class="form-label">Telefone</label>
          <input required type="text" class="form-control" id="telefone" name="telefone">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input required type="email" class="form-control" id="email" name="email">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary mb-3">Inserir</button>
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
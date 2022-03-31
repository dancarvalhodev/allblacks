<div class="card card-componente_2">
  <div class="card-body">
    <h5 class="card-title text-center">Listagem de torcedores</h5>
    <hr>
    <div class="table-responsive text-center">
      <table class="table tabela-empresas">
          <thead>
              <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Documento</th>
                  <th scope="col">CEP</th>
                  <th scope="col">Endereço</th>
                  <th scope="col">Bairro</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">UF</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Ação</th>
              </tr>
          </thead>
          <tbody>
              <?php if(empty($_SESSION['data'])): ?>
                  <tr>
                      <td colspan="10">
                          <div class="alert alert-danger" role="alert">
                              Nenhum Torcedor encontrado
                          </div>
                      </td>
                  </tr>
              <?php else: ?>
                <?php foreach($_SESSION['data'] as $torcedor): ?>
                  <tr>
                    <td scope="col"><?= $torcedor['nome'] ?></td>
                    <td scope="col"><?= $torcedor['documento'] ?></td>
                    <td scope="col"><?= $torcedor['cep'] ?></td>
                    <td scope="col"><?= $torcedor['endereco'] ?></td>
                    <td scope="col"><?= $torcedor['bairro'] ?></td>
                    <td scope="col"><?= $torcedor['cidade'] ?></td>
                    <td scope="col"><?= $torcedor['uf'] ?></td>
                    <td scope="col"><?= $torcedor['telefone'] ?></td>
                    <td scope="col"><?= $torcedor['email'] ?></td>
                    <td scope="col"><a href="/index_update_form/<?= $torcedor['id'] ?>" class="btn btn-info">Editar</a></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
          </tbody>
      </table>
    </div>
    <hr>
    <div class="row text-center">
      <div class="col-sm-12 ">
        <a class="btn btn-warning" href="/">Voltar</a>
      </div>
    </div>
  </div>
</div>
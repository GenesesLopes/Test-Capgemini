<template>
  <div>
    <div class="container">
      <div class="card">
        <form>
          <div class="card-body">
            <h5 class="card-title">
              <strong>Verificar Saldo</strong>
            </h5>
            <p class="card-text">
              <span class="text-danger">
                <strong>*</strong>
              </span> Campo obrigatório!
            </p>
            <div class="row">
              <div class="col-md-6">
                <div class="form-row">
                  <div class="col-md-2 col-sm-2">
                    <div class="form-group">
                      <label for="agencia">
                        Agencia
                        <span class="text-danger">
                          <strong>*</strong>
                        </span>
                      </label>
                      <input type="text" class="form-control" id="agencia" />
                      <div class="invalid-feedback">erro</div>
                    </div>
                  </div>
                  <div class="col-md-8 col-sm-8">
                    <div class="form-group">
                      <label for="conta">
                        Conta Corrente
                        <span class="text-danger">
                          <strong>*</strong>
                        </span>
                      </label>
                      <input type="text" class="form-control" id="conta" />
                      <div class="invalid-feedback">erro</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12">
                    <dl class="row">
                      <dt class="col-sm-3 text-center"><h3 class="h3"><strong>Saldo</strong></h3></dt>
                      <dd
                        class="col-sm-9 text-center text-success"
                      ><strong>R$ 400,00</strong></dd>
                    </dl>
                  </div>
                  <div class="col-md-12">
                      <h5 class="h5 text-center">Ultimas três operações</h5>
                    <table class="table table-sm text-center">
                      <thead>
                        <tr>
                          <th scope="col">Valor</th>
                          <th scope="col">Operação</th>
                          <th scope="col">Data</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="text-danger">
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr class="text-success">
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-success" type="submit">
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Salvar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
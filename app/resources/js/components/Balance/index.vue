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
                      <the-mask :mask="['##-#']" type="text" class="form-control" id="agencia"  />
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
                      <the-mask :mask="['#####-#']" type="text" class="form-control" id="conta"  />
                      <div class="invalid-feedback">erro</div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <h5 class="h5 text-center">Dados do Pessoais e Saldo</h5>
                    <table class="table table-sm text-center">
                      <thead>
                        <tr>
                          <th scope="col">Nome Completo</th>
                          <th scope="col">CFP</th>
                          <th scope="col">Saldo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Nome Completo</td>
                          <td>111.111.111-11</td>
                          <td>R$ 40.00</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
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
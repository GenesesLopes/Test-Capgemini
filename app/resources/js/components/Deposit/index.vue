<template>
  <div>
    <div class="container">
      <div class="card">
        <form>
          <div class="card-body">
            <h5 class="card-title">
              <strong>Depostar</strong>
            </h5>
            <p class="card-text">
              <span class="text-danger">
                <strong>*</strong>
              </span> Campo obrigatório!
            </p>
            <h5 class="h5">Dados da conta destinatária!</h5>
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
                      <the-mask :mask="['##-#']" type="text" class="form-control" id="agencia" />
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
                      <the-mask :mask="['#####-#']" type="text" class="form-control" id="conta" />
                      <div class="invalid-feedback">erro</div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <h5 class="h5 text-center">Dados do destinatário</h5>
                    <table class="table table-sm text-center">
                      <thead>
                        <tr>
                          <th scope="col">Nome Completo</th>
                          <th scope="col">CFP</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Nome Completo</td>
                          <td>111.111.111-11</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="valor">
                        Valor
                        <span class="text-danger">
                          <strong>*</strong>
                        </span>
                      </label>
                      <money class="form-control" id="valor" value="0.00"></money>
                      <div class="invalid-feedback">erro</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="alert alert-success" role="alert">
                  <p>Deposito realizado com Sucesso:</p>
                  <p>
                    Ag:
                    <strong>34</strong>
                  </p>
                  <p>
                    Conta:
                    <strong>1111-11</strong>
                  </p>
                  <p>
                    Valor:
                    <strong>R$ 40,00</strong>
                  </p>
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
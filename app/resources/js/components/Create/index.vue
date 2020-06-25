<template>
  <div class="container">
    <div class="card">
      <form>
        <div class="card-body">
          <h5 class="card-title">
            <strong>Cadastro de Usuários</strong>
          </h5>
          <p class="card-text">
            <span class="text-danger">
              <strong>*</strong>
            </span> Campos obrigatórios!
          </p>
          <div class="form-row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="name">
                  Nome Completo
                  <span class="text-danger">
                    <strong>*</strong>
                  </span>
                </label>
                <input type="text" class="form-control" id="name" placeholder="Nome completo" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="cpf">
                  CPF
                  <span class="text-danger">
                    <strong>*</strong>
                  </span>
                </label>
                <input type="text" class="form-control" id="cpf" placeholder="CPF" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">
                  E-mail
                  <span class="text-danger">
                    <strong>*</strong>
                  </span>
                </label>
                <input type="email" class="form-control" id="email" placeholder="E-mail" />
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-success" type="submit">
            <span
              class="spinner-border spinner-border-sm"
              role="status"
              aria-hidden="true"
            ></span>
            Salvar
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {};
</script>
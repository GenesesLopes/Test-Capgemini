<template>
  <div class="card text-center">
    <div class="card-header">
      <h3>Operações</h3>
    </div>
    <div class="card-body">
      <div class="row row-cols-1 row-cols-md-1">
        <div class="col mb-4">
          <!-- Div cadastro -->
          <router-link :to="{ name: 'create'}" class="link-customized">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-user-plus fa-5x" aria-hidden="true"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">
                  <strong>Cadastrar</strong>
                </h5>
                <p class="card-text">Cadastre-se Aqui!</p>
              </div>
            </div>
          </router-link>
        </div>
        <!-- Fm div cadastro -->
        <div class="col mb-4">
          <!-- Div saldo -->
          <router-link :to="{ name: 'balance'}" class="link-customized">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-money fa-5x" aria-hidden="true"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">
                  <strong>Saldo</strong>
                </h5>
                <p class="card-text">Confira o saldo disponível em sua conta</p>
              </div>
            </div>
          </router-link>
        </div>
        <!-- Fim div Saldo -->
        <div class="col mb-4">
          <!-- div Depósito -->
          <router-link :to="{ name: 'deposit'}" class="link-customized">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-sign-in fa-5x" aria-hidden="true"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">
                  <strong>Depósito</strong>
                </h5>
                <p class="card-text">Deposite para qualquer conta em nosso sistema.</p>
              </div>
            </div>
          </router-link>
        </div>
        <!-- fim div Depósito -->
        <div class="col mb-4">
          <!-- Div Saque -->
          <router-link :to="{ name: 'withdraw'}" class="link-customized">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-sign-out fa-5x" aria-hidden="true"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title">
                  <strong>Saque</strong>
                </h5>
                <p class="card-text">Retire a quantia necessária de sua conta.</p>
              </div>
            </div>
          </router-link>
        </div>
        <!-- Fim div Saque -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
    
}
</script>
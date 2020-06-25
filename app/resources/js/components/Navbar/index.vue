<template>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <router-link class="navbar-brand" :to="{ name: 'index'}">Voltar</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" ref="menu">
          <li class="nav-item">
              <router-link class="nav-link navbar-brand" :to="{ name: 'create'}">Cadastrar</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link navbar-brand" :to="{ name: 'balance'}">Saldo</router-link>
          </li>
          <li class="nav-item">
            <router-link class=" nav-link navbar-brand" :to="{ name: 'deposit'}">Deposito</router-link>
          </li>
          <li class="nav-item">
            <router-link class="navbar-brand nav-link" :to="{ name: 'withdraw'}">Saque</router-link>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  mounted: function(){
    document.querySelector(".is-active").parentNode.classList.add("color-text-link");
  }
}
</script>

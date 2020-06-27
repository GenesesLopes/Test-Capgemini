<template>
  <div class="container">
    <div class="card">
      <form @submit.prevent="client()">
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
                <label for="nome">
                  Nome Completo
                  <span class="text-danger">
                    <strong>*</strong>
                  </span>
                </label>
                <input
                  type="text"
                  class="form-control"
                  id="nome"
                  v-model="name"
                  placeholder="Nome completo"
                  v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.name !== undefined}"
                />
                <div class="invalid-feedback">
                  <span v-for="message in messagens.name" :key="message">{{message}}</span>
                  </div>
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
                <the-mask
                  :mask="['###.###.###-##']"
                  type="text"
                  v-model="cpf"
                  class="form-control"
                  v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.cpf !== undefined }"
                  id="cpf"
                />
                <div class="invalid-feedback">
                  <span v-for="message in messagens.cpf" :key="message">{{message}}</span>
                  </div>
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
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  v-model="email"
                  placeholder="E-mail"
                  v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.email !== undefined }"
                />
                <div class="invalid-feedback">
                  <span v-for="message in messagens.email" :key="message">{{message}}</span>
                </div>
              </div>
            </div>
            <div class="col-md-12" v-if="this.success">
              <div class="alert alert-success" role="alert">
                <p>Suas credencias são:</p>
                <p>
                  Ag:
                  <strong>{{data.agency}}</strong>
                </p>
                <p>
                  Conta:
                  <strong>{{data.account}}</strong>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-success" type="submit" v-bind:disabled=" !loading ? disabled : ''">
            <span class="spinner-border spinner-border-sm" v-if="this.loading" role="status" aria-hidden="true"></span>
            {{button_text}}
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      cpf: null,
      email: null,
      name: null,
    };
  },
  computed: {
    ...mapState({
      loading: state => state.create.loading,
      button_text: state => state.create.button_text,
      success: state => state.create.success,
      messagens: state => state.create.messagens,
      data: state => state.create.data
    })
  },
  methods: {
    client() {
      const data = {
        name: this.name,
        cpf: this.cpf,
        email: this.email
      };
      //disparando evento de criar cliente
      this.$store.dispatch("createClient", data);
    }
  },
  mounted: function(){
    //Limpando mensagens de erro e campo de sucesso
    this.$store.commit("ERRO_MESSAGE")
    this.$store.commit("SUCCESS")
  }
};
</script>
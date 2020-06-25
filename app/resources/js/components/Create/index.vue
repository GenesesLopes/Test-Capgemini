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
                  v-model="nome"
                  placeholder="Nome completo"
                  v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.nome !== undefined}"
                />
                <div class="invalid-feedback">{{messagens.nome}}</div>
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
                <div class="invalid-feedback">{{messagens.cpf}}</div>
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
                <div class="invalid-feedback">{{messagens.email}}</div>
              </div>
            </div>
            <div class="col-md-12" v-if="this.success">
              <div class="alert alert-success" role="alert">
                <p>Suas credencias são:</p>
                <p>
                  Ag:
                  <strong>34</strong>
                </p>
                <p>
                  Conta:
                  <strong>1111-11</strong>
                </p>
                <p>Foi enviado um e-mail para o destino cadastrado, com as credencias.</p>
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
      nome: null,
    };
  },
  computed: {
    ...mapState({
      loading: state => state.create.loading,
      button_text: state => state.create.button_text,
      success: state => state.create.success,
      messagens: state => state.create.messagens
    })
  },
  methods: {
    client() {
      const data = {
        nome: this.nome,
        cpf: this.cpf,
        email: this.email
      };
      //disparando evento de criar cliente
      this.$store.dispatch("createClient", data);
    }
  },
  mounted: function(){
    //Limpando mensagens de erro
    this.$store.commit("ERRO_MESSAGE")
  }
};
</script>
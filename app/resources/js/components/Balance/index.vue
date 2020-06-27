<template>
  <div>
    <div class="container">
      <div class="card">
        <form @submit.prevent="balance()">
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
                      <the-mask
                        :mask="['##-#']"
                        type="text"
                        class="form-control"
                        v-model="agency"
                        id="agencia"
                        v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.agency !== undefined}"
                      />
                      <div class="invalid-feedback">
                        <p v-for="message in messagens.agency" :key="message">{{message}}</p>
                      </div>
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
                      <the-mask
                        :mask="['##.###-##']"
                        type="text"
                        class="form-control"
                        id="conta"
                        v-model="account"
                        v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.account !== undefined}"
                      />
                      <div class="invalid-feedback">
                        <p v-for="message in messagens.account" :key="message">{{message}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" v-if="this.data !== null">
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
                          <td>{{this.data.name}}</td>
                          <td>{{this.data.cpf}}</td>
                          <td>R$ {{this.data.balance}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-6" v-if="this.data !== null">
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
                       <tr
                          v-for="historics in this.data.historic"
                          :key="historics.id"
                          v-bind:class="{ 'text-danger': historics.action == 'withdraw', 'text-success': historics.action == 'deposit' }"
                        >
                          <td>R$ {{ historics.value }}</td>
                          <td>{{ historics.action == 'withdraw' ? 'Saque': 'Depósito'}}</td>
                          <td>{{ historics.created_at }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button
              class="btn btn-success"
              type="submit"
              v-bind:disabled=" !loading ? disabled : ''"
            >
              <span
                class="spinner-border spinner-border-sm"
                v-if="this.loading"
                role="status"
                aria-hidden="true"
              ></span>
              {{button_text}}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      agency: null,
      account: null
    };
  },
  computed: {
    ...mapState({
      loading: state => state.balance.loading,
      button_text: state => state.balance.button_text,
      success: state => state.balance.success,
      messagens: state => state.balance.messagens,
      data: state => state.balance.data
    })
  },
  methods: {
    balance() {
      const dataFilable = {
        agency: this.agency,
        account: this.account
      };
      //disparando evento de criar cliente
      this.$store.dispatch("getBalance", dataFilable);
    }
  },
  mounted: function() {
    //Limpando mensagens de erro
    this.$store.commit("ERRO_MESSAGE");
    this.$store.commit("DATA",[]);
  }
};
</script>
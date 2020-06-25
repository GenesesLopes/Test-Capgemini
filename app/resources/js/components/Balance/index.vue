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
                        v-model="agencia"
                        id="agencia"
                        v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.agencia !== undefined}"
                      />
                      <div class="invalid-feedback">{{messagens.agencia}}</div>
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
                        :mask="['#####-#']"
                        type="text"
                        class="form-control"
                        id="conta"
                        v-model="conta"
                        v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.conta !== undefined}"
                      />
                      <div class="invalid-feedback">{{messagens.conta}}</div>
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
                          <td>Nome Completo</td>
                          <td>111.111.111-11</td>
                          <td>R$ 40.00</td>
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
            <button class="btn btn-success" type="submit" v-bind:disabled=" !loading ? disabled : ''" >
              <span class="spinner-border spinner-border-sm" v-if="this.loading" role="status" aria-hidden="true"></span>
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
      agencia: null,
      conta: null
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
      const data = {
        agencia: this.agencia,
        conta: this.conta
      };
      //disparando evento de criar cliente
      this.$store.dispatch("getBalance", data);
    }
  },
  mounted: function() {
    //Limpando mensagens de erro
    this.$store.commit("ERRO_MESSAGE");
    this.$store.commit("DATA");
  }
};
</script>
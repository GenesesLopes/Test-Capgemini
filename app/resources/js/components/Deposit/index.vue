<template>
  <div>
    <div class="container">
      <div class="card">
        <form @submit.prevent="deposit()">
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
                      <money class="form-control"
                       id="valor"
                        v-model="valor"
                        value="this.valor"
                        v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.valor !== undefined}"
                        ></money>
                      <div class="invalid-feedback">{{messagens.valor}}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6" v-if="this.data !== null">
                <div class="alert alert-success" role="alert">
                  <p>Deposito realizado com Sucesso:</p>
                  <p>
                    Ag:
                    <strong>{{this.agencia}}</strong>
                  </p>
                  <p>
                    Conta:
                    <strong>{{this.conta}}</strong>
                  </p>
                  <p>
                    Valor:
                    <strong>R$ {{this.valor}}</strong>
                  </p>
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
      conta: null,
      valor: "0.00"
    };
  },
  computed: {
    ...mapState({
      loading: state => state.deposit.loading,
      button_text: state => state.deposit.button_text,
      success: state => state.deposit.success,
      messagens: state => state.deposit.messagens,
      data: state => state.deposit.data
    })
  },
  methods: {
    deposit() {
      const data = {
        agencia: this.agencia,
        conta: this.conta,
        valor: this.valor
      };
      //disparando evento
      this.$store.dispatch("deposit", data);
      console.log(this.data)
    }
  },
  mounted: function() {
    //Limpando mensagens de erro
    this.$store.commit("ERRO_MESSAGE");
    this.$store.commit("DATA");
  }
};
</script>
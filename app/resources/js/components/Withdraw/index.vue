<template>
  <div>
    <div class="container">
      <div class="card">
        <form @submit.prevent="withdraw()">
          <div class="card-body">
            <h5 class="card-title">
              <strong>Saque</strong>
            </h5>
            <p class="card-text">
              <span class="text-danger">
                <strong>*</strong>
              </span> Campo obrigatório!
            </p>
            <h5 class="h5">Credenciais da conta!</h5>
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
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="valor">
                        Valor
                        <span class="text-danger">
                          <strong>*</strong>
                        </span>
                      </label>
                      <money
                        class="form-control"
                        id="valor"
                        v-model="value"
                        value="this.value"
                        v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.value !== undefined}"
                      ></money>
                      <div class="invalid-feedback">{{messagens.value}}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6" v-if="this.success == true">
                <div class="alert alert-success" role="alert">
                  <p>Saque realizado com Sucesso no valor de:</p>
                  <p>
                    <strong>R$ {{this.value}}</strong>
                  </p>
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
      account: null,
      value: "0.00"
    };
  },
  computed: {
    ...mapState({
      loading: state => state.withdraw.loading,
      button_text: state => state.withdraw.button_text,
      success: state => state.withdraw.success,
      messagens: state => state.withdraw.messagens      
    })
  },
  methods: {
    withdraw() {
      const data = {
        agency: this.agency,
        account: this.account,
        value: this.value
      };
      //disparando evento
      this.$store.dispatch("withdraw", data);
    }
  },
  mounted: function() {
    //Limpando mensagens de erro
    this.$store.commit("ERRO_MESSAGE");
    this.$store.commit("SUCCESS",false);
  }
};
</script>
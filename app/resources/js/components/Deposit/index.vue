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
                      <label for="agency">
                        Agência
                        <span class="text-danger">
                          <strong>*</strong>
                        </span>
                      </label>
                      <the-mask
                        :mask="['##-#']"
                        type="text"
                        class="form-control"
                        v-model="agency"
                        id="agency"
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
                      <money class="form-control"
                       id="valor"
                        v-model="value"
                        value="this.valor"
                        v-bind:class="{ 'is-invalid': messagens !== undefined && messagens.value !== undefined}"
                        ></money>
                      <div class="invalid-feedback">
                        <p v-for="message in messagens.value" :key="message">{{message}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6" v-if="this.success == true">
                <div class="alert alert-success" role="alert">
                  <p>Deposito realizado com Sucesso:</p>
                  <p>
                    Ag:
                    <strong>{{this.agency}}</strong>
                  </p>
                  <p>
                    Conta:
                    <strong>{{this.account}}</strong>
                  </p>
                  <p>
                    Valor:
                    <strong>R$ {{this.value}}</strong>
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
      agency: null,
      account: null,
      value: "0.00"
    };
  },
  computed: {
    ...mapState({
      loading: state => state.deposit.loading,
      button_text: state => state.deposit.button_text,
      success: state => state.deposit.success,
      messagens: state => state.deposit.messagens
    })
  },
  methods: {
    deposit() {
      const data = {
        agency: this.agency,
        account: this.account,
        value: this.value
      };
      //disparando evento
      this.$store.dispatch("deposit", data);
    }
  },
  mounted: function() {
    //Limpando mensagens de erro
    this.$store.commit("ERRO_MESSAGE");
    this.$store.commit("SUCCESS",[]);
  }
};
</script>
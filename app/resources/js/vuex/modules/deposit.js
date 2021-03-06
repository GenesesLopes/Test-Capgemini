import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import api from '../../services/api';

const optionsAlertSuccess = {
    icon: 'success'
};
const optionsAlertError = {
    icon: 'error'
};

export default {
    state: {
        loading: false,
        messagens: [],
        button_text: "Despositar",
        success: false,
    },
    mutations: {
        ERRO_MESSAGE(state, messagens = "") {
            if (messagens == "") state.messagens = [];
            else state.messagens = messagens;
        },
        LOADING(state, button) {
            state.loading = !state.loading;
            state.button_text = button;
        },
        SUCCESS(state,success = false)
        {
            state.success = success
        },
    },
    actions: {
        async deposit(context, params) {
            context.commit("LOADING", "Aguarde...");
            context.commit("ERRO_MESSAGE");
            await api.put('/account/deposit',{
                agency: params.agency,
                account: params.account,
                value: params.value
            }).then(response => {
                context.commit("SUCCESS",true);
                Vue.use(VueSweetalert2,optionsAlertSuccess);
                Vue.swal('Sucesso!','Deposito realizado com sucesso!');
            }).catch(error => {
                if(error.response.status !== 422){
                    Vue.use(VueSweetalert2,optionsAlertError);
                    Vue.swal('Erro!','Erro ao realizar deposito');
                }else{
                    context.commit("ERRO_MESSAGE",error.response.data)
                }                
            }).finally(() => {
                context.commit("LOADING", "Depositar");
            });
        }
    }
};
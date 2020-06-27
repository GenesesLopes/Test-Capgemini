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
        button_text: "Salvar",
        success: false,
        data: null
    },
    mutations: {
        ERRO_MESSAGE(state, messagens = '') {
            if (messagens == "") state.messagens = [];
            else state.messagens = messagens;
        },
        LOADING(state, button) {
            state.loading = !state.loading;
            state.button_text = button;
        },
        DATA(state, response) {
            state.data = response.data;
        },
        SUCCESS(state,success = false)
        {
            state.success = success
        },
        CREATE_CLIENT(state,data){
            state.data = data
        }
    },

    actions: {
       async createClient(context, params) {
            context.commit("LOADING", "Aguarde...");
            context.commit("ERRO_MESSAGE");
            await api.post('/users',{
                email: params.email,
                name: params.name,
                cpf: params.cpf
            }).then(response => {
                context.commit("SUCCESS",true);
                context.commit("CREATE_CLIENT",response.data.data);
                Vue.use(VueSweetalert2,optionsAlertSuccess);
                Vue.swal('Sucesso!','Cadastro realizado com sucesso!');
            }).catch(error => {
                if(error.response.status !== 422){
                    Vue.use(VueSweetalert2,optionsAlertError);
                    Vue.swal('Erro!','Erro ao realizar cadasto');
                }else{
                    context.commit("ERRO_MESSAGE",error.response.data)
                }                
            }).finally(() => {
                context.commit("LOADING", "Salvar");
            });
        }
    }
};

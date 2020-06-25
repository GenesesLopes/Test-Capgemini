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
        }
    },

    actions: {
        createClient(context, params) {
            context.commit("LOADING", "Aguarde...");
            context.commit("ERRO_MESSAGE");
            setTimeout(() => {
                context.commit("LOADING", "Salvar");
                context.commit("ERRO_MESSAGE", {
                    email: "erro email",
                    nome: "erro Nome",
                    cpf: "erro CPF"
                });
            }, 2000);
            
            /*
            uma requisição axios antes
            context.commit('CREATE_CLIENT',response.data)
            */

            //console.log(context,params)
        }
    }
};
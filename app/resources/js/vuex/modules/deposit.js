export default {
    state: {
        loading: false,
        messagens: [],
        button_text: "Despositar",
        success: false,
        data: null
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
        DATA(state, response = "") {
            if (response == "") state.data = null;
            else state.data = response.data;
        }
    },
    actions: {
        deposit(context, params) {
            context.commit("LOADING", "Aguarde...");
            context.commit("ERRO_MESSAGE");
            setTimeout(() => {
                context.commit("LOADING", "Despositar");
                context.commit("ERRO_MESSAGE", {
                    agencia: "erro agencia",
                    conta: "erro Conta Corrente",
                    valor: 'erro Valor'
                });
            }, 2000);
            console.log(params);
        }
    }
};
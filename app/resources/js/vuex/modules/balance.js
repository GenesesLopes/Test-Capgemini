import api from "../../services/api";

export default {
    state: {
        loading: false,
        messagens: [],
        button_text: "Buscar",
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
        async getBalance(context, params) {
            context.commit("LOADING", "Aguarde...");
            context.commit("ERRO_MESSAGE");
            await api.get(`/account/balance/${params.agency}/${params.account}`)
                .then(response => {
                    context.commit("DATA",response.data)
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        context.commit("ERRO_MESSAGE", error.response.data);
                    }
                })
                .finally(() => {
                    context.commit("LOADING", "Buscar");
                });

        }
    }
};

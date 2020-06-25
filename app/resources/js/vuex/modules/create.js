export default {
    state:{
        loading: false,
        messagens:[],
        button_text: 'Salvar'
    },
    mutations: {
        MESSAGE(state,messagens){
            state.messagens = messagens;
        },
        LOADING(state,button){
            state.loading = !state.loading;
            state.button_text = button;
        }
    },

    actions: {
        createClient(context,params){
            context.commit('LOADING','Aguarde...');
            setTimeout(() => {
                context.commit('LOADING', 'Salvar');    
            },2000)
            
            /*
            uma requisição axios antes
            context.commit('CREATE_CLIENT',response.data)
            */

            //console.log(context,params)
        }
    }
}
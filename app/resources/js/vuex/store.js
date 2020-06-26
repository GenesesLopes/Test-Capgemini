import Vue from 'vue';
import Vuex from 'vuex';

import create from './modules/create';
import balance from './modules/balance';
import deposit from './modules/deposit';
import withdraw from './modules/withdraw';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        create,
        balance,
        deposit,
        withdraw
    }
});
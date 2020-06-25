/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import router from './router';
import VueTheMask from 'vue-the-mask';
Vue.use(VueTheMask);

import money from 'v-money';
import store from './vuex/store';

// register directive v-money and component <money>
Vue.use(money, {precision: 2})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//componente Raiz
Vue.component('index', require('./components').default);
//Pagina Inicial
Vue.component('home', require('./pages/Home').default);
Vue.component('descricao', require('./components/Home/descricao.vue').default);
Vue.component('operacoes', require('./components/Home/operacoes.vue').default);

Vue.component('create', require('./pages/Create').default);
Vue.component('create-component', require('./components/Create').default);

Vue.component('balance', require('./components/Balance').default);
Vue.component('balance-component', require('./components/Balance').default);

Vue.component('deposit', require('./components/Deposit').default);
Vue.component('deposit-component', require('./components/Deposit').default);

Vue.component('withdraw', require('./components/Withdraw').default);
Vue.component('withdraw-component', require('./components/Withdraw').default);

Vue.component('not-found', require('./components/Error/404.vue').default);
Vue.component('navbar', require('./components/Navbar').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store
});

import Vue from 'vue';
import Router from 'vue-router';

import Index from '../components';
import Balance from '../pages/Balance';
import Withdraw from '../pages/Withdraw';
import Deposit from '../pages/Deposit';
import Create from '../pages/Create';
import Error404 from '../components/Error/404';

Vue.use(Router);

const routes = [
    {
        name: 'index',
        path: '/',
        component: Index
    },
    {
        name: 'create',
        path: '/cadastrar',
        component: Create
    },
    {
        name: 'balance',
        path: '/saldo',
        component: Balance
    },
    {
        name: 'deposit',
        path: '/deposito',
        component: Deposit
    },
    {
        name: 'withdraw',
        path: '/saque',
        component: Withdraw
    },
    {
        name: 'not found',
        path: '*',
        component: Error404
    }

];

const router = new Router({
    mode: 'history',
    routes
});

export default router;
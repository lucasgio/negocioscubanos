import Vue from 'vue';
import VueRouter from 'vue-router';

import InitialComponent from '../components/InitialComponent';
import MostrarNegocios from '../components/MostrarNegocios';

const routes = [
    
    {
        path:'/',
        component:InitialComponent
    },
    {
        path:'/negocios/:id',
        name:'negocios',
        component:MostrarNegocios
    },
   
    
];


const router = new VueRouter({
    
    routes
    
});

Vue.use(VueRouter);

export default router;
import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);



export default new Vuex.Store({

    state:{

        restaurantes:[],
        barberia:[],
        negocio:{},
        allnegocios:[],
        categorias:[],
        categoria:''
    },

    mutations:{
        AGREGAR_RESTAURANT(state,restaurante){
            state.restaurantes = restaurante;
        },
        AGREGAR_BARBERIA(state,barberia){
            state.barberia = barberia;
        },
        SHOW_NEGOCIO(state,negocio){
            state.negocio = negocio;
        },
        SHOW_ALL_NEGOCIOS(state,negocios){
            state.allnegocios = negocios;
        },
        ALL_CATEGORIA(state,categoria){
            state.categorias = categoria;
        },
        SHOW_CATEGORIA(state,categoria){
            state.categoria = categoria;
        }
    },
    getters:{
        showNegocios : (state) => state.negocio,
        obtenerImage : (state) => state.negocio.imagen,
        allNegocios  : (state) => state.allnegocios,
        allCategorias: (state) => state.categorias,
        showCategoria: (state) => state.categoria
    },

    


});
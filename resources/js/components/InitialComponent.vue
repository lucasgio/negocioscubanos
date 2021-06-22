<template>
<div>
    <menucategoria></menucategoria>
    <mapa-negocios></mapa-negocios>
    <restaurante-component></restaurante-component>
    <barberia-component> </barberia-component>
</div>
</template>

<script>
import RestauranteComponent from './RestauranteComponent.vue';
import BarberiaComponent from './BarberiaComponent.vue'

import store from '../store/';
import MapaNegocios from './MapaNegocios.vue';
import Menucategoria from './Menucategoria.vue';

    export default {
        store,
        components:{
            RestauranteComponent,
            BarberiaComponent,
            MapaNegocios,
                Menucategoria 
        }
    }
</script>
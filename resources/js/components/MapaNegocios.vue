<template>
<div class="mapa">
  <l-map
    :zoom="zoom" 
    :center="center" 
    :options="mapOptions"
  >
      <l-tile-layer 
        :url="url" 
        :attribution="attribution"
      />
          <l-marker 
            v-for="negocio in negocios" 
            v-bind:key="negocio.id"
            :lat-lng="obtenerCoordenadas(negocio)"  
            :icon="iconoNegocio(negocio)" 
            @click="detallesNegocio(negocio.id)" 
            >
              <l-tooltip>
                  <div class="text-muted font-weight-bold">{{negocio.nombre_negocio}}</div>
              </l-tooltip>
          </l-marker>
  </l-map>
</div>
</template>

<script>

import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LTooltip, LIcon } from "vue2-leaflet";


export default {

    components:{

        LMap,
        LTileLayer,
        LMarker,
        LTooltip,
        LIcon


    },
    data() {
        return {
            zoom: 13,
            center: latLng(23.137101780277284, -82.35785485661802),
            url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            attribution:
                '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            currentZoom: 11.5,
            currentCenter: latLng(23.137101780277284, -82.35785485661802),
            showParagraph: false,
            mapOptions: {
                zoomSnap: 0.5
            },
            showMap: true
        };
    },
    created(){
        axios.get('/api/negocios')
             .then(resp =>{
                this.$store.commit('SHOW_ALL_NEGOCIOS',resp.data);
             })
             .catch(err=>{
                console.log(err);
             });
    },
    computed:{
        negocios(){
            return this.$store.getters.allNegocios;
        }
    },
    methods:{
        obtenerCoordenadas(negocio){
            return{
                lat:negocio.lat,
                lng:negocio.lng
            }
        },
        iconoNegocio(negocio){
            const { slug } = negocio.categoria;
            return L.icon({
                iconUrl:`images/${slug}.png`,
                iconSize:[35,35]
            })
        },
        detallesNegocio(id){
          return this.$router.push({ name:'negocios', params:{ id }});
        }
    },
    watch:{
        '$store.state.categoria':function(){
            axios.get('/api/categoria/' + this.$store.getters.showCategoria)
                 .then(resp=>{
                    this.$store.commit("SHOW_ALL_NEGOCIOS",resp.data);
                 })
                 .catch(err=>console.log(err)); 
        }
    }   


}
</script>

<style>
 .mapa{
    height: 600px;
 }
</style>
<template>
    <div class="mapa">
        <l-map :zoom="zoom" :center="center" :options="mapOptions">
            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
            <l-marker :lat-lng="{ lat, lng }">
                <l-tooltip>
                    <div>{{ negocio.nombre_negocio }}</div>           
                </l-tooltip>
            </l-marker>
        </l-map>
    </div>
</template>

<script>
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LTooltip } from "vue2-leaflet";
export default {
    components: {
        LMap,
        LTileLayer,
        LMarker,
        LTooltip
    },
    data() {
        return {
            zoom: 16,
            center: latLng(23.137101780277284, -82.35785485661802),
            url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            attribution:
                '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            currentZoom: 11.5,
            mapOptions: {
                zoomSnap: 0.5
            },
            showMap: true,
            lat: "",
            lng: ""
        };
    },

    created: function() {
        setTimeout(() => {
            this.lat = this.$store.getters.showNegocios.lat;
            this.lng = this.$store.getters.showNegocios.lng;
            this.center = latLng(this.lat, this.lng);
        }, 2000);
    },
  computed:{
     negocio(){
        return this.$store.getters.showNegocios;
     }
  } 
};
</script>

<style scoped>
@import "https://unpkg.com/leaflet@1.7.1/dist/leaflet.css";
.mapa {
    height: 300px;
    width: 100%;
}
</style>

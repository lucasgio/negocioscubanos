<template>
   <div class="container my-5">
      <p class="display-4 text-muted ">{{negocio.nombre_negocio}}</p>
      <div class="row align-items-start mt-3">
         <div class="col-md-8">
            <img class="imagen-negocio" :src="`storage/${negocio.imagen_principal}`" alt="Imagen de un negocio">
            <p class="fw-light w-100 mt-3">
               {{negocio.descripcion}}
            </p>
         </div>
         <aside class="col-md-4" id="info">
            <p class="text-center text-white mt-2 text-uppercase">Informacion del negocio</p>
            <mapa-component></mapa-component>   
            <p class="text-white mt-1">
               <span class="font-weight-bold">
                  Ubicación :   
               </span>   
               {{negocio.calle}} - {{negocio.municipio}}
            </p> 
            <p class="text-white mt-1">
               <span class="font-weight-bold">
                  Provincia :   
               </span>   
               {{negocio.provincia}} 
            </p>   
            <p class="text-white mt-1">
               <span class="font-weight-bold">
                  Horario :   
               </span>   
               {{negocio.apertura}} - {{negocio.cierre}}
            </p> 
            <p class="text-white mt-1">
               <span class="font-weight-bold">
                  Telefono :   
               </span>   
               {{negocio.telefono}}
            </p> 
         </aside>
      </div>
      <div class="row col-md-8">
         <imagen-gallery></imagen-gallery>
      </div>

   </div>
   
</template>

<script>
import ImagenGallery from './ImagenGallery.vue';
import MapaComponent from './MapaComponent.vue';
export default {
  components: {
    MapaComponent,
    ImagenGallery,

      
   },
   
   mounted(){
   const { id } = this.$route.params;   
   axios.get(`api/negocios/${id}`)
        .then( resp =>{
           this.$store.commit("SHOW_NEGOCIO",resp.data);
        })
        .catch( err => {
          console.log(err);
        });
  },
  computed:{
     negocio(){
        return this.$store.getters.showNegocios;
     }
  } 
}
</script>

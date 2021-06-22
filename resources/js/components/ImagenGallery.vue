<template>
 
  <div class="">
      <h2 class="mt-4">Galeria de imagenes</h2>
      <ol class="row list-unstyled mt-3">
          <li class="col-md-6 mb-4" v-for="img in imagen" v-bind:key="img.id">
             <a :href="`/storage/${img.ruta}`" data-lightbox="img" data-title="Imagenes del negocio">
                <img class="img-fluid" :src='`/storage/${img.ruta}`' alt="Imagen de galeria">
             </a>
          </li>
      </ol>
  </div>
</template>

<script>
import Lightbox from 'lightbox2';
export default {
    computed:{ 
        imagen(){
            return this.$store.getters.obtenerImage
        }
     }
}
</script>

<style scoped>
    @import 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css';
</style>
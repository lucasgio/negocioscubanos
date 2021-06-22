<template>
  <div class="container my-5">
     <h3>Restaurantes</h3>
    <div class="row">
      <div class="col-md-4 mt-4" v-for="restaurant in this.restaurante" v-bind:key="restaurant.id" >
        <div class="card shadow-lg rounded-4">
          <img class="card-img-top" :src="`storage/${restaurant.imagen_principal}`" alt="Imagenes de restaurantes">
          <div class="card-body">
            <h6 class="text-title text-primary">{{restaurant.nombre_negocio}}</h6>
            <h6 class="text-caption text-primary">Ubicacion: {{restaurant.municipio}}</h6>
            <h6 class="text-caption text-primary">Horario: {{restaurant.apertura}} - {{restaurant.cierre}}</h6>
            <router-link :to="{name:'negocios',params: {id:restaurant.id}}">
              <a type="button" class="btn btn-outline-primary d-block mt-5" >Ver negocio</a>
            </router-link>  
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  mounted(){
    axios.get('api/categoria/restaurante')
         .then( resp =>{
          this.$store.commit("AGREGAR_RESTAURANT", resp.data);
         })
         .catch( err => {
           console.log(err);
         });
  },
  computed:{

    restaurante(){
      return this.$store.state.restaurantes
    }

  }
}
</script>

<style>
 a:hover{
   text-decoration: none;
 }
</style>

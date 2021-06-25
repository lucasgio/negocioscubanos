<template>
  <div class="container my-5">
     <h3>Barberias</h3>
    <div class="row">
      <div class="col-md-4 mt-4" v-for="barberia in this.barberias" v-bind:key="barberia.id" >
        <div class="card shadow-lg rounded-4">
          <img class="card-img-top" :src="`${barberia.imagen_principal}`" alt="Imagenes de barberias">
          <div class="card-body">
            <h6 class="text-title text-primary">{{barberia.nombre_negocio}}</h6>
            <h6 class="text-caption text-primary">Ubicacion: {{barberia.municipio}}</h6>
            <h6 class="text-caption text-primary">Horario: {{barberia.apertura}} - {{barberia.cierre}}</h6>
            <router-link :to="{ name:'negocios', params:{id:barberia.id }}">
              <a type="button" class="btn btn-outline-primary d-block mt-5">Ver negocio</a>
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
    axios.get('api/categoria/barberias')
         .then( resp =>{
             this.$store.commit("AGREGAR_BARBERIA",resp.data);
         })
         .catch( err => {
           console.log(err);
         });
  },
  computed:{

    barberias(){
        return this.$store.state.barberia;
    }

  }
}
</script>
<template>
  <div >
    <nav class="d-flex flex-column flex-md-row container justify-content-lg-center">
        <a  
            class="mt-0 w-100" 
            v-for="categoria in categorias" 
            v-bind:key="categoria.id"
            @click="mostrarCategoria(categoria)" 
        >
        <small>{{categoria.nombre}}</small>
        </a>
    </nav>
  </div>
</template>

<script>
export default {
    created() {
        axios
            .get("api/categorias/")
            .then(resp => {
                this.$store.commit("ALL_CATEGORIA", resp.data);
            })
            .catch(err => {
                console.log(err);
            });
    },
    computed: {
        categorias() {
            return this.$store.getters.allCategorias;
        }
    },
    methods:{
        mostrarCategoria(categoria){
            this.$store.commit("SHOW_CATEGORIA",categoria.slug)
        }
    }
};
</script>

<style scoped>
div {
    background-color: #C91A23;
}
nav a {
    color: white;
    font-weight: bold;
    font-size: 100%;
    text-transform: uppercase;
    padding: 0.5rem 2rem;
    text-align: center;
    flex: 1;
}
nav a:hover {
    color: #C91A23;
    cursor: pointer;
    background-color: #FFFFFC;
    animation-delay: 5s;
}
nav a {
    background-color: #C91A23;
}

</style>

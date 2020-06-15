<template>
 
  <li class="nav-item dropdown ">
    <a
      class="nav-link dropdown-toogle"
      aria-expanded="false"
      data-toggle="dropdown"
      data-target="dt2"
      href="#"
    >
      {{titulo}}
      <span class="caret"></span>
    </a>

        <div class="dropdown-menu  scrollable" aria-labelledby="dt2"  >
      <a 
        type="button"
        v-for="item in lista"
        :key="item.id"
        class="dropdown-item"
        tabindex="0"
        role="button"
       
        :title="item.descripcion"
      data-toggle="modal" data-target="#componentmodal"
      @click="llamomodal(item)"
      >{{item.nombre}}</a>
    </div>


<modalbarra-component :titulo="modaltitulo" :cuerpo="cuerpo" :empresa="esempresa" ></modalbarra-component>
  </li>
</template>

<script>
export default {
 
  props: {
   
    titulo: String
  },
  data(){
    return {
      modaltitulo : '',
      cuerpo : '',
      esempresa: false
    }
  },
  mounted() {
    console.log("DropDown component");
    this.$store.dispatch('getCategorias')

  },
  computed: {
    lista() {
      return this.$store.state.categorias;
    }
  },
  methods: {
    llamomodal: function(item) {
    console.log(item)
   
      this.modaltitulo=item.nombre;
      this.cuerpo=item.descripcion;
      this.esempresa=false;
    
    }

  }
};
</script>


<style lang="scss" scoped>
.dropdown-item {
  background-color: indigo;
}
.scrollable {
  overflow-y:scroll;
   max-height:300px;
}
</style>
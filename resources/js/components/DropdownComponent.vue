<template>
 
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link " href="/#inicio" active>Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/#informacion">Ayuda</a>
                    </li>
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
    <div class="dropdown-menu  scrollable" aria-labelledby="dt2" >
      <a 
        type="button"
        v-for="item in lista"
        :key="item.id"
        class="dropdown-item "
        tabindex="0"
        role="button"
        
        :title="item.apellidos"
         data-toggle="modal" data-target="#componentmodal"
         @click="llamomodal(item, true)"
        
      >{{item.nombre}}</a>
    </div>


  </li>
    <li class="nav-item dropdown ">
    <a
      class="nav-link dropdown-toogle"
      aria-expanded="false"
      data-toggle="dropdown"
      data-target="dt2"
      href="#"
    >
      {{titulo2}}
      <span class="caret"></span>
    </a>

        <div class="dropdown-menu  scrollable" aria-labelledby="dt2"  >
      <a 
        type="button"
        v-for="item in lista2"
        :key="item.id"
        class="dropdown-item"
        tabindex="0"
        role="button"
       
        :title="item.descripcion"
      data-toggle="modal" data-target="#componentmodal"
      @click="llamomodal(item, false)"
      >{{item.nombre}}</a>
    </div>


<modalbarra-component :titulo="modaltitulo" :cuerpo="cuerpo" :empresa="esempresa" ></modalbarra-component>
  </li>
  <li class="nav-item">
                        <a class="nav-link" href="/#buscar">Buscar Trabajo</a>
                    </li>

  </ul>
  
</template>

<script>
export default {
 
  props: {

    titulo: String,
    titulo2: String,
   
  },
  data(){
    return {
      modaltitulo : '',
      cuerpo : '',
      esempresa: true
    }
  },
  mounted() {
    console.log("DropDown component");
    this.$store.dispatch('getEmpresas')
    this.$store.dispatch('getCategorias')
  },
  computed: {
    lista() {
      return this.$store.state.empresas;
    },
    lista2() {
      return this.$store.state.categorias;
    },
  },

  methods: {
    llamomodal: function(item, empresa) {
    console.log(item)
if (empresa){
      this.modaltitulo=item.nombre;
      this.cuerpo=item;
      this.esempresa=true;
}else {
     this.modaltitulo=item.nombre;
      this.cuerpo=item.descripcion;
      this.esempresa=false;
}
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
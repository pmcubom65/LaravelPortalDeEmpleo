<template>
  <ul class="navbar-nav">
  
    <li class="nav-item">
      <a class="nav-link" href="/#inicio" active>Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/#informacion">Ayuda</a>
    </li>
    <li class="nav-item dropdown">
      <a
        class="nav-link dropdown-toogle text-nowrap"
        aria-expanded="false"
        data-toggle="dropdown"
        data-target="dt2"
        href="#"
      >
        {{titulo}}
        <span class="caret"></span>
      </a>

      <div class="dropdown-menu scrollable" aria-labelledby="dt2">
        <a
          type="button"
          v-for="item in lista"
          :key="item.id"
          class="dropdown-item"
          tabindex="0"
          role="button"
          :title="item.email"
          data-toggle="modal"
          data-target="#componentmodal"
          @click="llamomodal(item, true)"
        >{{item.name}}</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a
        class="nav-link dropdown-toogle text-nowrap"
        aria-expanded="false"
        data-toggle="dropdown"
        data-target="dt2"
        href="#"
      >
        {{titulo2}}
        <span class="caret"></span>
      </a>

      <div class="dropdown-menu scrollable" aria-labelledby="dt2">
        <a
          type="button"
          v-for="item in lista2"
          :key="item.id"
          class="dropdown-item"
          tabindex="0"
          role="button"
          :title="item.descripcion"
          data-toggle="modal"
          data-target="#componentmodal"
          @click="llamomodal(item, false)"
        >{{item.nombre}}</a>
      </div>
    </li>
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/#buscar">Buscar Trabajo</a>
    </li>

    <modalbarra-component
      :titulo="modaltitulo"
      :cuerpo="cuerpo"
      :empresa="esempresa"
      :objeto="latlong"
    ></modalbarra-component>

    <li class="izquierda">
      <input
        type="text"
        list="lasempresas"
        v-model="inputemp"
        placeholder="Buscar Empresas"
        :disabled="disableemp"
        @click="activaemp"
      />
      <datalist id="lasempresas">
        <option v-for="item in lista" :key="item.id" :value="item.name"></option>
      </datalist>
    </li>
    <li>
      <input
        type="text"
        v-model="inputcat"
        list="lascategorias"
        placeholder="Buscar Categorias"
        :disabled="disablecat"
        
        @click="activacat"
      />
      <datalist id="lascategorias">
        <option v-for="item in lista2" :key="item.id" :value="item.nombre"></option>
      </datalist>
    </li>
    <li>
      <button
        class="btn btn-primary btn-sm text-nowrap"
        @click="busqueda"
        type="button"
        tabindex="0"
        role="button"
        
        data-toggle="modal"
        data-target="#componentmodal"
      >Buscar Filtro</button>
    </li>
    <li>
      <button class="btn btn-danger btn-sm" @click="volver">Cancelar</button>
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    titulo: String,
    titulo2: String
  },
  data() {
    return {
      modaltitulo: "",
      cuerpo: "",
      esempresa: true,
      inputemp: "",
      inputcat: "",
      disablecat: false,
      disableemp: false,
      latlong: { lat: 0, lng: 0, numeroempleados: 0, domicilio: "" }
    };
  },
  mounted() {
    console.log("DropDown component");
    this.$store.dispatch("getEmpresas");
    this.$store.dispatch("getCategorias");
  },
  computed: {
    lista() {
      return this.$store.state.empresas;
    },
    lista2() {
      return this.$store.state.categorias;
    },
    getCategoria() {
      console.log(this.inputcat);
      return this.$store.getters.getCategoriaById(this.inputcat);
    },
    getEmpresa() {
      console.log(this.inputemp);
      return this.$store.getters.getEmpresaById(this.inputemp);
    }
  },

  methods: {
    llamomodal: function(item, empresa) {
      if (empresa) {
        this.modaltitulo = item.name;
        this.cuerpo = item.email;
        this.latlong.numeroempleados = new Number(item.numero_empleados);
        this.latlong.domicilio = item.domicilio;
        this.latlong.lat = new Number(item.latitud);
        this.latlong.lng = new Number(item.longitud);

        this.esempresa = true;
      } else {
        console.log(item);
       
        this.modaltitulo = item.nombre;
        this.cuerpo = item.descripcion;
        this.esempresa = false;
      }
    },

    activacat: function() {
      this.disableemp = true;
    },

    activaemp: function() {
      this.disablecat = true;
    },
    volver: function() {
      this.disableemp = false;
      this.disablecat = false;
    },
    busqueda: function() {
      if (this.disableemp) {
        this.llamomodal(this.getCategoria[0], false);
      } else {
        this.llamomodal(this.getEmpresa[0], true);
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
  overflow-y: scroll;
  max-height: 300px;
}

@media (min-width: 700px) {
  .izquierda {
    margin-left: 15em;
  }
}


#ellogo {
  height: 20px;
  width: auto;
}
</style>
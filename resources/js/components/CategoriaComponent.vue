<template>
  <!--modal categorias-->
  <div
    class="modal fade"
    id="sitiocategoriamodalcomponent"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
    v-click-outside="cerrarmodal"
   
  >
    <div class="modal-dialog" role="document">
      <form id="categoria-data" @submit.prevent="crearcategoria">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <div class="form-row col-12">
              <div class="form-group col-12">
                <label for="catname">Nombre de la Categoria</label>
                <input
                  type="text"
                  class="form-control"
                  id="catname"
                  name="catname"
                  placeholder="Nombre de la Categoria"
                  v-model="nombre"
                  :disabled="quitar"
                />
              </div>
            </div>

            <button type="button" @click="cerrarmodal"  class="close mx-0 px-0" data-dismiss="modal">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-12">
                <label for="desccat">Descripcion de la Categoria</label>
                <textarea
                  class="form-control"
                  id="desccat"
                  name="desccat"
                  rows="8"
                  v-model="descripcion"
                   :disabled="quitar"
                >Descripcion de la Categoria</textarea>
              </div>
            </div>






            <div class="form-row text-center">
              <div class="form-group col-12 mx-auto">
                <div id="mismensajes2">
                  <p class="alert">{{salida}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" id="botoncat" >
            <button class="btn btn-success m-auto  btn-lg" type="submit"  v-show="mostrarbotoncat">
              Guardar
              Categoria
            </button>

              <button class="btn btn-secondary m-auto btn-xs-block btn-lg"  @click="cerrarmodal"   data-dismiss="modal" type="button" v-show="!mostrarbotoncat">
              Cerrar
            </button>
                  
                 <select
          name="categoria"
          id="categoria"
          class="form-control"
        >
          <option  selected hidden class="text-center">Categorias Existentes</option>
          <option v-for="item in categorias" v-bind:key="item.id" :value="item.id">{{item.nombre}}</option>
        </select>


          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>


export default {
  props: {
    token: String,
    id: String
  },
  data() {
    return {
      nombre: "",
      descripcion: "",
      salida: "",
      mostrarbotoncat: true,
      categoriacreada: [],
      quitar: false
    };
  },
  methods: {
    cerrarmodal: function() {
      this.nombre="";
      this.descripcion="";
      this.salida="";
      this.mostrarbotoncat=true;
      this.quitar=false;
    },

    crearcategoria: function() {
    
      
      axios
        .post(route("oferta", { id: this.id }), {
          catname: this.nombre,
          desccat: this.descripcion,
          _token: this.token
        })
        .then(response => {
          console.log(response);
          let valores = response.data;
          let key;
         
          Object.entries(valores).forEach(entry => {
            key=entry[0]
            this.salida = entry[1].mssg;
            this.categoriacreada = {
              id : entry[1].elid,
              name: entry[1].elname
            }
          });
          if (key==='success'){
              this.mostrarbotoncat=false
               this.$store.dispatch('getCategorias')
               this.quitar=true;
             
          }else {
            this.salida="Todos los campos se tienen que rellenar";
          }
         
        })
        .catch(function(error) {
          console.log(error);
        });
            
    }
  },
  mounted() {
    console.log("Component mounted.");
    this.$store.dispatch('getCategorias')
  },
  computed: {
    categorias: function() {
      return this.$store.state.categorias
    }
  }
};
</script>

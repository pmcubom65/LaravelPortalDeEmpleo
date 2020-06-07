<template>
  <!--modal categorias-->
  <div
    class="modal fade"
    id="sitiocategoriamodalcomponent"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
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
                />
              </div>
            </div>

            <button type="button" class="close mx-0 px-0" data-dismiss="modal">
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
          <div class="modal-footer" id="botoncat"  v-show="mostrarbotoncat">
            <button class="btn btn-success m-auto" type="submit">
              Guardar
              Categoria
            </button>
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
      mostrarbotoncat: true
    };
  },
  methods: {
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

          Object.entries(valores).forEach(entry => {
            this.salida = entry[1].mssg;
          });
          this.mostrarbotoncat=false
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

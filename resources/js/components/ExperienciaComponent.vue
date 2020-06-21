<template>
  <!--modal-->
  <div class="modal fade" id="sitiomodalexperiencia" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form @submit.prevent="nuevaexperiencia">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Añada su experiencia laboral</h3>

            <button type="button" class="close mx-0 px-0" data-dismiss="modal">
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row col-12">
              <div class="form-group col-6">
                <label for="tituloexp">Puesto</label>

                <input
                  type="text"
                  class="form-control"
                  id="tituloexp"
                  name="tituloexp"
                  placeholder="puesto ocupado"
                    v-model="tituloexp_i"
                  @change="tituloexp_i=$event.target.value"
                  :disabled="habilitado"
                />
              </div>
              <div class="form-group col-6">
                <label for="empresaexp">Empresa</label>

                <input
                  type="text"
                  class="form-control"
                  id="empresaexp"
                  name="empresaexp"
                  placeholder="Empresa"
                v-model="empresaexp_i"
                  @change="empresaexp_i=$event.target.value"
                  :disabled="habilitado"
                />
              </div>
            </div>
            <div class="form-row col-12">
              <div class="form-group col-6">
                <label for="inicioexp">Fecha Incorporacion</label>

                <input type="date" class="form-control" id="inicioexp" name="inicioexp" 
                v-model="inicioexp_i"
                @change="inicioexp_i=$event.target.value"
                :disabled="habilitado"
                
                />
              </div>
              <div class="form-group col-6">
                <label for="finexp">Fecha Salida</label>

                <input type="date" class="form-control" id="finexp" name="finexp"
                    v-model="finexp_i"
                @change="finexp_i=$event.target.value"
                :disabled="habilitado"
                 />
              </div>
            </div>

            <div class="form-group col-12">
              <label>Categoria Profesional</label>

              <select class="form-control" id="cat" name="cat" @change="cat_i=$event.target.value">
                <option :value="categoria_id" selected>{{nombre}}</option>
                <option
                  v-for="item in categorias"
                  v-bind:key="item.id"
                  :value="item.id"
                >{{item.nombre}}</option>
              </select>
            </div>

            <div class="form-group col-12">
              <label for="desexp">Descripcion de la Experiencia</label>

              <textarea class="form-control" id="desexp" name="desexp" rows="8"
              finexp
                v-model="desexp_i"
                @change="desexp_i=$event.target.value"
                :disabled="habilitado"
              >Descripcion del puesto</textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success m-auto btn-xs-block" type="submit">
              Guardar
              Experiencia
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
    tituloexp: {
      type: String,
      required: false
    },
    empresaexp: {
      type: String,
      required: false
    },
    inicioexp: {
      type: String,
      required: false
    },

    finexp: {
      type: Number,
      required: false
    },
    cat: {
      type: String,
      required: false
    },
    desexp: {
      type: String,
      required: false
    },
    
    hhabilitado: {
      type: Boolean,
      required: false
    },
    
    token: String,
    id: String,
  },
    categorias: {
      type: Array,
      required: false
    },

  data() {
    return {
      tituloexp_i: this.$props.tituloexp,
      empresaexp_i: this.$props.empresaexp,
      inicioexp_i: this.$props.inicioexp,
      finexp_i: this.$props.finexp,
      cat_i: this.$props.cat,
      desexp_i: this.$props.desexp,
      salida: '',
      abierto_i: false,
      trabajador : this.$props.estrabajador,
      habilitado: this.$props.hhabilitado,
     
      
    };
  },
  mounted() {
    console.log("Formulario experiencia montado");
  }
};
</script>


<style lang="scss" scoped>
#sitiomodalexperiencia {
    position: absolute;
}
</style>
<template>
  <form id="inscribirse" @submit.prevent="inscribirse">
    <div class="form-row">
      <div class="form-group col-sm-12">
        <label for="nombre">Titulo de la Oferta Laboral</label>
        <input
          type="text"
          class="form-control"
          id="titulo"
          name="titulo"
          placeholder="titulo de la oferta"
          v-model="titulo_i"
          @change="titulo_i=$event.target.value"
          :disabled="habilitado_i"
        />
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="Provincia">Provincia</label>
        <select
          class="form-control"
          id="Provincia"
          name="Provincia"
          :disabled="habilitado_i"
          @change="provincia_i=$event.target.value"
        >
          <option :value="provincia_id" selected hidden>{{region}}</option>
          <option
            v-for="item in provincias"
            v-bind:key="item.id"
            :value="item.id"
          >{{item.region_name}}</option>
        </select>
      </div>

      <div class="fom-group col-sm-6">
        <label for="Experiencia">Experiencia Mínima</label>
        <select
          class="form-control"
          id="Experiencia"
          name="Experiencia"
          :disabled="habilitado_i"
          @change="experiencia_i=$event.target.value"
        >
          <option :value="experiencia_id" selected hidden>{{experiencia}}</option>
          <option v-for="item in experiencias" v-bind:key="item.id" :value="item.id">{{item.nombre}}</option>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="Salario" class="text-nowrap">Salario bruto anual Jornada Completa</label>
        <input
          type="text"
          class="form-control"
          id="Salarioid"
          name="Salarioid"
          placeholder="introduzca salario"
          :disabled="habilitado_i"
          v-model="salario_i"
          @change="slario_i=$event.target.value"
        />
      </div>

      <div class="fom-group col-sm-6">
        <label for="contrato">Tipo de Contrato</label>
        <select
          class="form-control"
          id="contrato"
          name="contrato"
          :disabled="habilitado_i"
          @change="contrato_i=$event.target.value"
        >
          <option :value="contrato_id" selected hidden>{{contrato}}</option>
          <option v-for="item in contratos" v-bind:key="item.id" :value="item.id">{{item.nombre}}</option>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-sm-12">
        <label for="exp">Descripcion de la Oferta</label>
        <textarea
          class="form-control"
          id="oferta"
          :disabled="habilitado_i"
          name="oferta"
          rows="8"
          v-model="descripcion"
        ></textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-12">
        <label for="exp">Categoria Profesional</label>
        <select
          name="cat"
          id="cat"
          class="form-control"
          :disabled="habilitado_i"
          @change="cat_i=$event.target.value"
        >
          <option :value="categoria_id" selected hidden>{{categoria}}</option>
          <option v-for="item in categorias" v-bind:key="item.id" :value="item.id">{{item.nombre}}</option>
        </select>
      </div>
    </div>
  

    <div class="form-row my-3 fuera" v-show="necesitocategoria">
      <button
        type="button"
        class="btn btn-warning btn-lg m-auto"
        data-toggle="modal"
        id="botoncatmodal"
        data-target="#sitiocategoriamodalcomponent"
        :disabled="habilitado_i"
      >
        Añadir una nueva categoria si ninguna
        coincide
      </button>
    </div>

    <categoria-component :id="id" :token="token" ref="categoriaInput"></categoria-component>

    <div class="form-row">
      <div class="col-12" id="mensajesinsc">
        <p class="alert text-center" v-html="salida"></p>
      </div>
    </div>

    <div class="form-row my-3 fuera">
      <button
        class="btn btn-success m-auto btn-lg"
        type="submit"
        id="botonsub"
        :disabled="abierto_i!=='1'"
      >{{ letrero }}</button>
    </div>
  </form>
</template>

<script>

export default {
  props: {
    crearoferta: {
      type: Boolean,
      required: true
    },
     necesitocategoria: {
      type: Boolean,
      required: true
    },
    id: {
      type: String,
      required: false,
      default: '0'
    },
    titulo: {
      type: String,
      required: false
    },
    provincia_id: {
      type: String,
      required: false
    },
    region: {
      type: String,
      required: false
    },
    experiencia_id: {
      type: String,
      required: false
    },
    experiencia: {
      type: String,
      required: false
    },
    salario: {
      type: String,
      required: false
    },
    contrato_id: {
      type: String,
      required: false
    },
    contrato: {
      type: String,
      required: false
    },

    categoria_id: {
      type: String,
      required: false
    },
    categoria: {
      type: String,
      required: false
    },
    usuario: {
      type: String,
      required: false
    },
    token: String,
    habilitado: {
      type: Boolean,
      required: false
    },

    abierto: {
      type: String,
      required: false
    },
    relato: {
      type: String,
      required: false
    },
    letrero: {
      type: String,
      required: false
    },

    provincias: {
      type: Array,
      required: false
    },
 
    contratos: {
      type: Array,
      required: false
    },
    experiencias: {
      type: Array,
      required: false
    }
  },

  data() {
    return {
      descripcion: this.relato,
      titulo_i: this.$props.titulo,
      provincia_i: this.provincia_id,
      experiencia_i: this.experiencia_id,
      salario_i: this.$props.salario,
      contrato_i: this.contrato_id,
      salida: "",
      abierto_i: this.abierto,
      cat_i: this.categoria_id,
      habilitado_i: this.$props.habilitado,
    };
  },
  methods: {
    inscribirse: function() {
    
      if (!this.crearoferta) {
        axios
          .post(route("apuntarse", { id: this.id }), {
            id: this.id,
            trabajador_id: this.usuario,
            _token: this.token
          })
          .then(response => {
            let valores = response.data;

            Object.entries(valores).forEach(entry => {
              this.salida = entry[1];
            });

            this.abierto_i = 1;
          })
          .catch(function(error) {
            console.log(error);
          });
      } else {
          this.salida='';

        axios
          .put(route("oferta", { id: this.usuario }), {
            titulo: this.titulo_i,
            Provincia: this.provincia_i,
            Experiencia: this.experiencia_i,
            Salarioid: this.salario_i,
            contrato: this.contrato_i,
            ofertad: this.descripcion,
            cat: this.cat_i,
            _token: this.token,
            oferta: this.id
          })
          .then(response => {
            let valores = response.data;
            this.salida='';
           
            let key;
            Object.entries(valores).forEach(entry => {
              key = entry[0];
             
              if (key === "success") {
              this.salida = entry[1].toString();
              this.abierto_i = 1;
              this.habilitado_i=true;
            }else {
              var campoerroneo=key.toString();
              var clave=entry[1].toString();
              
              this.salida = this.salida+'  '+clave+': '+campoerroneo+'.<br/>';
            
            }
            });
         
          })
          .catch(error => {
            console.log(error);
           
    
          });
      
      }
    }
  },
  
  mounted() {
    console.log("Formulario Inscripción montado.");
    this.$store.dispatch('getCategorias')
  },
    computed: {
    categorias: function() {
      return this.$store.state.categorias
    }
  }
};
</script>

<style lang="scss" scoped>
.alert {
  font-size: 1.5rem;
}
</style>
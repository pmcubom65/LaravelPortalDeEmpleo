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
          :value="titulo"
          @change="titulo_i=$event.target.value"
          :disabled="habilitado"
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
          :disabled="habilitado"
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
          :disabled="habilitado"
          @change="experiencia_i=$event.target.value"
        >
          <option :value="experiencia_id" selected hidden>{{experiencia}}</option>
          <option v-for="item in experiencias" v-bind:key="item.id" :value="item.id">{{item.nombre}}</option>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="Salario">Salario bruto anual Jornada Completa</label>
        <input
          type="text"
          class="form-control"
          id="Salarioid"
          name="Salarioid"
          placeholder="introduzca salario"
          :disabled="habilitado"
          :value="salario"
          @change="salario_i=$event.target.value"
        />
      </div>

      <div class="fom-group col-sm-6">
        <label for="contrato">Tipo de Contrato</label>
        <select
          class="form-control"
          id="contrato"
          name="contrato"
          :disabled="habilitado"
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
          :disabled="habilitado"
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
          :disabled="habilitado"
          @change="cat_i=$event.target.value"
        >
          <option :value="categoria_id" selected hidden>{{categoria}}</option>
          <option v-for="item in categorias" v-bind:key="item.id" :value="item.id">{{item.nombre}}</option>
        </select>
      </div>
    </div>
    <input type="hidden" name="usu" id="usu" :value="usuario" />
    <input type="hidden" name="_token" :value=" token " />
    <input type="hidden" name="id" :value=" id " />

    <div class="form-row my-3 fuera" v-show="necesitocategoria">
      <a
        href
        class="btn btn-warning btn-lg m-auto"
        data-toggle="modal"
        id="botoncatmodal"
        data-target="#sitiocategoriamodalcomponent"
      >
        Añadir una nueva categoria si ninguna
        coincide
      </a>
    </div>

    <categoria-component :id="id" :token="token" ref="categoriaInput"></categoria-component>

    <div class="form-row">
      <div class="col-12" id="mensajesinsc">
        <p class="alert text-center">{{ salida }}</p>
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
      required: false
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
      titulo_i: this.titulo,
      provincia_i: this.provincia_id,
      experiencia_i: this.experiencia_id,
      salario_i: this.salario,
      contrato_i: this.contrato_id,
      salida: "",
      abierto_i: this.abierto,
      cat_i: this.categoria_id
    };
  },
  methods: {
    inscribirse: function() {
      var that = this;
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
        

        axios
          .put(route("oferta", { id: this.id }), {
            titulo: this.titulo_i,
            Provincia: this.provincia_i,
            Experiencia: this.experiencia_i,
            Salarioid: this.salario_i,
            contrato: this.contrato_i,
            oferta: this.descripcion,
            cat: this.cat_i,
            _token: this.token
          })
          .then(response => {
            let valores = response.data;
            console.log(response);
            let key;
            Object.entries(valores).forEach(entry => {
              key = entry[0];
              this.salida = entry[1].toString();
            });
            if (key === "success") {
              this.abierto_i = 1;
            }
          })
          .catch(function(error) {
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
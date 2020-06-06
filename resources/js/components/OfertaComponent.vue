<template>
  <form id="inscribirse" @submit.prevent="inscribirse" :ruta="route('apuntarse', {id : id})">
 
    <div class="form-row">
      <div class="form-group col-sm-12">
        <label for="nombre">Titulo de la Oferta Laboral</label>
        <input
          type="text"
          class="form-control"
          id="titulo"
          name="titulo"
          :value="titulo"
          @input="titulo_i=$event.target.value"
          :disabled="habilitado"
        />
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-sm-6">
        <label for="Provincia">Provincia</label>
        <select class="form-control" id="Provincia" name="Provincia" :disabled="habilitado">
          <option :value="provincia_id" selected  hidden>{{region}}</option>
        </select>
      </div>

      <div class="fom-group col-sm-6">
        <label for="Experiencia">Experiencia Mínima</label>
        <select class="form-control" id="Experiencia" name="Experiencia" :disabled="habilitado">
          <option :value="experiencia_id" selected  hidden>{{experiencia}}</option>
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
          :disabled="habilitado"
          :value="salario"
        />
      </div>

      <div class="fom-group col-sm-6">
        <label for="contrato">Tipo de Contrato</label>
        <select class="form-control" id="contrato" name="contrato" :disabled="habilitado">
          <option :value="contrato_id" selected  hidden>{{contrato}}</option>
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
        <select name="cat" id="cat" class="form-control" :disabled="habilitado">
          <option :value="categoria_id" selected hidden>{{categoria}}</option>
        </select>
      </div>
    </div>
    <input type="hidden" name="usu" id="usu" :value="usuario" />
    <input type="hidden" name="_token" :value=" token " />
    <input type="hidden" name="id" :value=" id " />

    <div class="form-row">
      <div class="col-12" id="mensajesinsc"></div>
    </div>

    <div class="form-row my-3 fuera">
    
      <button
        class="btn btn-success m-auto btn-lg"
        type="submit"
        id="botonsub" :disabled="abierto!=='1'"
      >Inscribirse</button>

    
    </div>
  </form>
</template>

<script>
export default {
  props: {
    id: String,
    titulo: String,
    provincia_id: String,
    region: String,
    experiencia_id: String,
    experiencia: String,
    salario: String,
    contrato_id: String,
    contrato: String,
 

    categoria_id: String,
    categoria: String,
    usuario: String,
    token: String,
    habilitado: Boolean,

    abierto: String,
    relato: String,
  },
 
  data() {
    return {
      descripcion: this.relato,
      titulo_i: this.titulo,
      ruta: ""
    };
  },
  methods : {
      inscribirse : function() {
        axios.post(this.ruta, {
    id: this.id,
    trabajador_id: this.usuario
  })
  .then(function (response) {
    
    console.log(response);
  })
  .catch(function (error) {
    
    console.log(error);
  });
      }
  },
  mounted() {
    console.log("Formulario Inscripción montado.");
  }
};
</script>
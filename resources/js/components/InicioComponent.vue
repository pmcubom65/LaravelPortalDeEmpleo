<template>
  <div class="col-4 p-3">
    <h3 class="text-center">Contactanos</h3>
    <form id="contactarid" @submit.prevent="submitEmail" >

      <div class="form-group">
        <input
          type="email"
          class="form-control"
          placeholder="email"
          name="emailid"
          id="emailid"
          v-model="emailid"
        />
      </div>
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          placeholder="asunto"
          name="asuntoid"
          id="asuntoid"
          v-model="asuntoid"
        />
      </div>
      <div class="form-group">
        <textarea rows="8" cols="63" name="mssgid" id="mssgid" v-model="mssgid">Mensaje</textarea>
      </div>
      <div class="form-group text-center sinmargen">
        <button type="submit" class="btn btn-primary btn-lg" :disabled="resultado">Enviar Correo</button>
      </div>
      <div class="form-group text-center" id="informar">
        <p class="alert">{{ salida }}</p>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  props: {
    token: String
  },
  data: function() {
    return {
      emailid: "",
      asuntoid: "",
      mssgid: "",

      resultado: false,
      salida: ""
    };
  },
  methods: {
    submitEmail: function() {
      axios
        .post(route('inicio'), {
          emailid: this.emailid,
          asuntoid: this.asuntoid,
          mssgid: this.mssgid,
         _token: this.token
        })
        .then(response => {
          this.salida = "";
          console.log(response.data);

          let valores = response.data;

          Object.entries(valores).forEach((entry) => {
           this.salida=entry[1]+' ';
           if (entry[0]==='success') {
             this.resultado=true
           }
            
         
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.sinmargen {
  margin-bottom: 3px !important;
}


</style>

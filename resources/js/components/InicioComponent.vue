<template>
  <div class="col-md-4 p-3">
    <h3 class="text-center">Contactanos</h3>
    <form id="contactarid" @submit.prevent="submitEmail" :ruta="route('inicio')">
      @csrf
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
        <textarea rows="8" cols="55" name="mssgid" id="mssgid" v-model="mssgid">Mensaje</textarea>
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Enviar Correo</button>
      </div>
      <div class="form-group text-center" id="informar"></div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  data: function() {
    return {
      emailid: "",
      asuntoid: "",
      mssgid: "",
      ruta: ""
    };
  },
  methods: {
    submitEmail: function() {
      axios
        .post(this.ruta, {
          emailid: this.emailid,
          asuntoid: this.asuntoid,
          mssgid: this.mssgid
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>

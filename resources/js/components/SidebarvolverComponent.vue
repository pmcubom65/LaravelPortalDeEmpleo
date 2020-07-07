<template>
     <div id="sideBar" class="col-2 pb-0 inicio2 espacio">
      <h3 class="text-center">
        <a :href="ruta1">
          <span class="misiconos glyphicon glyphicon-repeat text-light"></span>
          <br />
        </a><span class="d-block">Volver</span>
      </h3>

      <h3 class="text-center">
        <a :href="ruta2">
          <span class="misiconos glyphicon glyphicon-bullhorn text-light"></span>
        </a><span class="d-block">Publicar</span>
      </h3>

      <h3 class="text-center">
        <a :href="ruta3">
          <span class="misiconos glyphicon glyphicon-briefcase text-light"></span>
          <br />
        </a><span class="d-block">Datos</span>
      </h3>
    </div>
</template>

<script>


    export default {
        components: {
       
        },
        data() {
            return {
                    ruta1: "/empresa/" + this.$props.id + "/published/" + this.$props.oferta,
                    ruta2: "/empresa/" + this.$props.id + "/oferta",
                    ruta3: "/empresa/" + this.$props.id
            }
        },
        props : {
            oferta: Number,
            id: Number
        }
    }
</script>

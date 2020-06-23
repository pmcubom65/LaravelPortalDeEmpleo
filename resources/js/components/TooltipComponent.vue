
<template>
    <v-popover >
  <!-- This will be the popover target (for the events and position) -->
  <button  v-tooltip="contenidotooltip" class="btn btn-danger btn-lg"  type="button" >{{ letrero }}</button>
  <!-- This will be the content of the popover -->
  
  <p slot="popover" >{{contenidoslot}}<br>

    <button class="btn btn-lg btn-primary"  data-toggle="modal"
                        data-target="#sitiomodalexperiencia"  type="button" >Crear nueva experiencia</button>

  </p>
  
</v-popover>


 
</template>

<script>

    export default {
      
        mounted() {
            console.log('montado tootltip.')
        },
        props : {
          contenidotooltip: Object,
          contenidoslot: String,
          letrero: String,
          experiencia: Boolean,
          
        },
        methods : {
           
        },
        data() {
          return {
             
          } 
        }
    }
</script>

<style lang="scss">


.tooltip {
  display: block !important;
  z-index: 2000;
  
  

  .tooltip-inner {
    background: indigo;
    color: white;
    border-radius: 16px;
    padding: 5px 10px 4px;
    font-size: 1.25rem;
  }

  .tooltip-arrow {
    width: 0;
    height: 0;
    border-style: solid;
    position: absolute;
    margin: 5px;
    border-color: indigo;
    z-index: 1;
  }

  &[x-placement^="top"] {
    margin-bottom: 5px;

    .tooltip-arrow {
      border-width: 5px 5px 0 5px;
      border-left-color: transparent !important;
      border-right-color: transparent !important;
      border-bottom-color: transparent !important;
      bottom: -5px;
      left: calc(50% - 5px);
      margin-top: 0;
      margin-bottom: 0;
    }
  }

  &[x-placement^="bottom"] {
    margin-top: 5px;

    .tooltip-arrow {
      border-width: 0 5px 5px 5px;
      border-left-color: transparent !important;
      border-right-color: transparent !important;
      border-top-color: transparent !important;
      top: -5px;
      left: calc(50% - 5px);
      margin-top: 0;
      margin-bottom: 0;
    }
  }

  &[x-placement^="right"] {
    margin-left: 5px;

    .tooltip-arrow {
      border-width: 5px 5px 5px 0;
      border-left-color: transparent !important;
      border-top-color: transparent !important;
      border-bottom-color: transparent !important;
      left: -5px;
      top: calc(50% - 5px);
      margin-left: 0;
      margin-right: 0;
    }
  }

  &[x-placement^="left"] {
    margin-right: 5px;

    .tooltip-arrow {
      border-width: 5px 0 5px 5px;
      border-top-color: transparent !important;
      border-right-color: transparent !important;
      border-bottom-color: transparent !important;
      right: -5px;
      top: calc(50% - 5px);
      margin-left: 0;
      margin-right: 0;
    }
  }

  &.popover {
    $color: #f9f9f9;

    .popover-inner {
      background: $color;
      color: black;
      padding: 24px;
      border-radius: 5px;
      box-shadow: 0 5px 30px rgba(black, .1);
    }

    .popover-arrow {
      border-color: $color;
    }
  }

  &[aria-hidden='true'] {
    visibility: hidden;
    opacity: 0;
    transition: opacity .15s, visibility .15s;
  }

  &[aria-hidden='false'] {
    visibility: visible;
    opacity: 1;
    transition: opacity .15s;
  }
 
}
</style>
<template>
<!-- Modal -->
<div class="modal fade" id="componentmodal"  data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ titulo }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{ cuerpo }}
      </div>
      <div class="modal-footer col text-center">
        <button type="button" class="btn btn-secondary  mx-auto" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</template>

<script>


    export default {
        components: {
 
        },
        props: {
            titulo: String,
            cuerpo: String,
            empresa: Boolean
        },
        mounted() {
            console.log('Modal barra component montado')
        }
    }
</script>


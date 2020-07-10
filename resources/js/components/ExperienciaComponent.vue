<template>
  <!--modal-->
  <div class="modal fade" id="sitiomodalexperiencia" tabindex="-1" role="dialog" aria-hidden="true" v-click-outside="cerrarmodal">
    <div class="modal-dialog" role="document">
      <form @submit.prevent="nuevaexperiencia">
        <div class="modal-content">
          <div class="modal-header">
            <h3>{{getletrero}}</h3>
            

            <button type="button" @click="cerrarmodal" class="close mx-0 px-0" data-dismiss="modal">
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
                  :value="getExperiencias.puesto"
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
                  :value="getExperiencias.empresa"
         
                  @change="empresaexp_i=$event.target.value"
                  :disabled="habilitado"
                />
              </div>
            </div>
            <div class="form-row col-12">
              <div class="form-group col-6">
                <label for="inicioexp">Fecha Incorporacion</label>

                <input type="date" class="form-control" id="inicioexp" name="inicioexp" 
                :value="getExperiencias.inicio"
     
                @change="inicioexp_i=$event.target.value"
                :disabled="habilitado"
                
                />
              </div>
              <div class="form-group col-6">
                <label for="finexp">Fecha Salida</label>

                <input type="date" class="form-control" id="finexp" name="finexp"
                 
                    :value="getExperiencias.fin"
                @change="finexp_i=$event.target.value"
                :disabled="habilitado"
                 />
              </div>
            </div>

            <div class="form-group col-12">
              <label>Categoria Profesional</label>

              <select class="form-control" id="cat" name="cat" @change="cat_i=$event.target.value" :disabled="habilitado">
                <option :value="categoria_id" selected>{{getExperiencias.nombre}}</option>
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
           
                @change="desexp_i=$event.target.value"
                :value="getExperiencias.descripcion"
                :disabled="habilitado"
              >Descripcion del puesto</textarea>
            </div>
          </div>
          <div class="modal-footer" >
             <div class="form-row col-12  m-auto ">
             <p class="alert text-center" v-html="salida"></p>
            </div>
            <div class="form-row col-12">
            <button  class="btn btn-success m-auto btn-xs-block btn-lg" type="submit" :disabled="habilitado">
              Guardar
              Experiencia
            </button>
            

            <button class="btn btn-secondary m-auto btn-xs-block btn-lg"  @click="cerrarmodal"   data-dismiss="modal" type="button"
            >
              Cerrar
            </button>
            </div>
           
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { bus } from "../app";
export default {
  computed: {
     getExperiencias() {
        if (Object.entries(this.experiencia).length === 0){
          return {
            puesto: (this.habilitado) ? this.tituloexp_i: '',
            empresa: (this.habilitado) ? this.empresaexp_i: '',
            inicio: (this.habilitado) ? this.inicioexp_i: '',
            fin: (this.habilitado) ? this.finexp_i: '',
            nombre: (this.habilitado) ? this.nombre: '',
            descripcion: (this.habilitado) ? this.desexp_i: ''
          }
            

            } else {
            return this.experiencia;
        }
        
    },
   
    getletrero() {
      if (Object.entries(this.experiencia).length === 0){
        return 'Añada su experiencia laboral';
         
      }else {
        return 'Experiencia laboral: '+this.experiencia.puesto;
      }
    }
  },
    created() {
    bus.$on("experienciaseleccionada", (exp) => {
       this.experiencia=exp;
     
       
      });

      
    
  }
  ,
    props: {
 
    
    hhabilitado: {
      type: Boolean,
      required: false
    },
    
    token: String,
    id: String,
 
    categorias: {
      type: Array,
      required: false
    },
  
 },
  data() {
    return {
      tituloexp_i: '',
      empresaexp_i: '',
      inicioexp_i: '',
      finexp_i: '',
      cat_i: '',
      desexp_i: '',
      salida: '',
   
      habilitado: this.$props.hhabilitado,
      experiencia: Object,
      categoria_id: 0
     
      
    };
  },
  methods: {
    cerrarmodal: function() {
      this.salida='';
  

      this.habilitado=this.$props.hhabilitado
  
    },



    nuevaexperiencia : function() {
            axios
        .post(route("homeexpe"), {
          _token: this.token,
          tituloexp: this.tituloexp_i,
          inicioexp: this.inicioexp_i,
          finexp: this.finexp_i,
          cat: this.cat_i,
          desexp: this.desexp_i,
          empresaexp: this.empresaexp_i
      
        })
        .then(response => {
          this.salida='';
          let valores = response.data;

          Object.entries(valores).forEach(entry => {
            if (entry[0].toString() === "success") {
        
              
              this.$store.dispatch("getTrabajadores");
              this.$store.dispatch("getExperiencias");
              this.habilitado = true;
              this.salida = entry[1].toString();

              
            }else {
              var campoerroneo=entry[0].toString();
              var clave=entry[1].toString();
              
              this.salida = this.salida+'  '+clave+': '+campoerroneo+'.<br/>';
            
            }

 
          });
        })
        .catch(function(error) {
          console.log(error);
        });
    }
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

.alert {
  font-size: 1.5rem;
  margin: 0 auto; 
}
</style>
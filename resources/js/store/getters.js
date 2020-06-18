
   export const getCategoriaById = function (state,id) {
           
       return state.categorias.filter(categoria=> {
         return  categoria.nombre===id;
       });
}


    export const getEmpresaById = function (state, id) {
        
      state.empresas.filter(empresa => {
        return empresa.nombre===id;
    }
        );
    }


export const getCategoriaById = (state) => (id) => {

  var salida = state.categorias.filter(categoria => {
    return categoria.nombre === id;
  });
  return salida;
}


export const getEmpresaById = (state) => (name) => {

  var salida = state.empresas.filter(empresa => {
    return empresa.name === name;
  });
  return salida;
}


export const getExperienciasById = (state) => (user_id) => {

  var salida = state.experiencias.filter(experiencia => {
    return experiencia && experiencia.user_id == user_id;
  });
  return salida;
}




export const getTrabajadorByOferta = (state) => (oferta_id) => {

  var salida = state.trabajadoresporoferta.filter(trabajador => {
    return trabajador.oferta_id == oferta_id;
  });

  if (typeof salida[0] === "undefined") {
    return {
        
      inscritos: [],
      seleccionados: [],
      descartados: []
    }
  } else {


    var inscritos= salida.filter(trabajador => {
      return trabajador.seleccionado === null;
    });


 
  
    var seleccionados= salida.filter(trabajador => {
      return trabajador.seleccionado == 1;
    });

    
  
    var descartados= salida.filter(trabajador => {
      return trabajador.seleccionado == 0;
    });

   


     return {
        
       inscritos: inscritos,
       seleccionados: seleccionados,
       descartados: descartados
     } 
  }
  
}






export const numero_experiencias = (state) => (user_id) => {

  var salida = state.trabajadores.filter(trabajador => {
    
 
    return trabajador.user_id == user_id;
  });

  if (typeof salida[0] === "undefined") {
    return 0;
  } else {
    return salida[0].numero_experiencias;
  }
  
}



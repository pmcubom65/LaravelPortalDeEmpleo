
export const getCategoriaById = (state) => (id) => {

  var salida = state.categorias.filter(categoria => {
    return categoria.nombre === id;
  });
  return salida;
}


export const getEmpresaById = (state) => (id) => {

  var salida = state.empresas.filter(empresa => {
    return empresa.nombre === id;
  });
  return salida;
}


export const getEmpresaByUserId = (state) => (user_id) => {
  
  var salida = state.empresas.filter(empresa => {
    return empresa.user_id === user_id;
  });
  return salida;
}
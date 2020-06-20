
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



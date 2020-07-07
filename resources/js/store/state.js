let candidatura=window.localStorage.getItem('tab');


export default {
    categorias: [],
    empresas: [],
    trabajadores: [],
    experiencias: [],
    trabajadoresporoferta: [],
    mostrarcandidaturas: candidatura ? candidatura : null,
}
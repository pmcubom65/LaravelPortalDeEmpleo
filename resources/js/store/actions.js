import Axios from "axios"

import axios from 'axios';

export const getCategorias=({commit})=>{
    axios.get(route('categorias')).
    then(response=>{
        commit('SET_CATEGORIAS', response.data);
    })

}



export const getEmpresas=({commit})=>{
    axios.get(route('empresas')).
    then(response=>{
        commit('SET_EMPRESAS', response.data);
    })

}
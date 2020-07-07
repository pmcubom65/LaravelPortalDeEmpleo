import Axios from "axios"

import axios from 'axios';

export const getCategorias=({commit})=>{
    axios.get(route('categorias')).
    then(response=>{
        commit('SET_CATEGORIAS', response.data);
    })

}


export const getTrabajadores=({commit})=>{
    axios.get(route('trabajadors')).
    then(response=>{
        commit('SET_TRABAJADORES', response.data);
    })

}



export const getTrabajadoresPorOferta=({commit})=>{
    axios.get(route('trabajadoresporoferta')).
    then(response=>{
       
        commit('SET_TRABAJADORESPOROFERTA', response.data);
    })

}


export const getMostrarCandidaturas=({commit}, value)=>{
      
        commit('SET_MOSTRARCANDIDATURAS', value);
    

}







export const getEmpresas=({commit})=>{
    axios.get(route('empresas')).
    then(response=>{
        commit('SET_EMPRESAS', response.data);
    })

}



export const getExperiencias= async ({commit})=>{
    await axios.get(route('experiencias')).
    then(response=>{
        commit('SET_EXPERIENCIAS', response.data);
    })

}
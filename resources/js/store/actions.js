import Axios from "axios"

import axios from 'axios';

export const getCategorias=({commit})=>{
    axios.get(route('categorias')).
    then(response=>{
        commit('SET_CATEGORIAS', response.data);
    })

}
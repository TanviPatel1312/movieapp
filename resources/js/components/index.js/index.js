import axios from "axios"
import _ from "lodash"

export default{
    state:{
        moviepost:[]
    },
    getters:{
        getmoviepost(state){
            return state.moviepost
        }
    },
    actions:{
        getmoviepost(context){
            axios.get('/moviepost')
            .then((response)=>{
                console.log(response.data)
                context,commit('allpost',response.data.pots)
            })
        }
    },
    mutations:{
        getmoviePost(state,payload){
            return state.moviepost = payload
        },
        siglePost(state,payload){
            return state.singlepost = payload
        },
        allcategories(state,payload){
            return state.allcategories = payload
        },
        getPostByCatId(state,payload){
            state.blogpost = payload
        },
        getSearchPost(state,payload){
            state.blogpost = payload
        },
        latestpost(state,payload){
            state.latestpost = payload
        }
}
}
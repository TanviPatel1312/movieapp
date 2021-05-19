<template>
   
     <div class="col-md-4">
        <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
       <!-- <div v-for="post in movies">-->
                
          <div class="col-md-4">
            <div class="product-item">
              
              <a href="#"> <img :src="`movieimg/${post.movie_img}`" alt="" /></a>
              <div class="down-content">
                <a href="#"><h4>{{post.title}}</h4></a>
                <h6>{{post.releseyear}}</h6>
                <p>{{post.overview}}</p>
                <p>{{post.runtime}}</p>
                <p>{{post.castmember}}</p>
          
                
              </div>
            </div>
          </div>
          </div>
          </div>
        
      </div>
      </section>
      </div>
</template>
<script>
import moviepost from "./moviepost.vue"
export default {

    name:'moviepost',
   
   component:{
     moviepost
   },
    mounted() {
       this.$store.dispatch('getmoviePost');
    },
   
    computed:{
  moviepost(){
                return this.$store.getters.getmoviePost
            }
    },
    methods: {
       getallmoviepost(){
            //     if(this.$route.params.id!=null){
            //         this.$store.dispatch('getPostByCatId',this.$route.params.id);
            //     }else{
            //         this.$store.dispatch('getmoviePost');
            //     }
             }
    },
    watch:{
            $route(to,from){
                this.getAllmoviePost();
            }
        }
}
</script>
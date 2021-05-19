
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);


// import storeData from "./store/index"
// const store = new Vuex.Store(
//     storeData
// )

Vue.component('home-main',require('./components/moviepost.vue'));
// import routes from 'route';
// const router = new VueRouter({
//     history: true,
//     mode: 'history',
//     routes,
// })
// Vue.component('home-main',require('./components/moviepost.vue'));

// Vue.component('example-component', require('./components/ExampleComponent.vue'));



new Vue({
    router,
    //store,
    el: '#app',
  
});

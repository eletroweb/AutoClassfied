
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//import VueRouter from 'vue-router';
//window.Vue.use(Vue);
import VueResource from 'vue-resource'
window.Vue.use(VueResource);
import AnuncioComponent from './components/anuncios/Anuncio.vue'
import NavBarComponent from './components/layout/NavBar.vue'
import LoginComponent from './components/user/Login.vue'
import AnuncioSearchComponent from './components/home/AnuncioSearch.vue'
import VueSelect from 'vue-select';

const app = new Vue({
    el: '#app',
    components:{
      'anuncio': AnuncioComponent,
      'navbar': NavBarComponent,
      'login': LoginComponent,
      'anuncio-search-home': AnuncioSearchComponent,
      'v-select': VueSelect
    }
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
      restaurants: null,
      categories: null,
      categories_rest: [],
    },

    mounted() {

      this.loadCategories();
      this.loadRestaurants();
        
    },

    watch: {
      categories_rest: {
        handler() {
          this.loadCategories();
          this.loadRestaurants();
        },
        deep: true
      }
    },

    methods:{
      loadCategories () {
        axios.get('/api/categories')
        .then((response) => {
          this.categories = response.data.data;
          console.log(this.categories);
        })
      },

      loadRestaurants () {
        axios.get('/api/restaurants',
          { params: { categories_rest: this.categories_rest} })
          .then((response) => {
          this.restaurants = response.data.data;
          console.log(this.restaurants);
        })
      }
    },
    
});
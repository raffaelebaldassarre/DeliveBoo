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
      restaurants: [],
      categories: [],
      selectedCat: [],
    },
    methods:{
      chooseCategory(){
        console.log(this.selectedCat);
        if (this.selectedCat.length > 3) {
          this.selectedCat.pop();
          console.log(this.selectedCat);
        } 
      }
    },
    
    mounted() {
        axios.get('api/restaurants').then(response=> {
          console.log(response.data.data);
          this.restaurants = response.data.data;
          console.log(this.restaurants);
        })
        axios.get('api/categories').then(response=> {
          console.log(response.data.data);
          this.categories = response.data.data;
          console.log(this.categories);
          
        })
    },
    /* computed: {
      filteredItems() {
        return this.items.filter(item => {
           return item.type.toLowerCase().indexOf(this.search.toLowerCase()) > -1
        })
      }
    } */
});
$(document).ready(function() {

  var last_valid_selection = null;

  $('#categories_list').change(function(event) {

    if ($(this).val().length > 3) {

      $(this).val(last_valid_selection);
    } else {
      last_valid_selection = $(this).val();
    }
  });
});
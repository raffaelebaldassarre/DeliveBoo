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
      orderCart: [],
      totalPrice: '',
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
      }
    },

    methods:{
      takeOrder(dish) {
        $cart = document.getElementById("cart");
        $cart.style.display = "flex";

        if(this.orderCart.some(obj => obj.id === dish.id)){
          this.orderCart.forEach(elem=> {
            if(elem.id === dish.id){
              this.moreDish(elem);
              this.priceTotal();
            }
          })
        }else{
          this.orderCart.push(dish);
          Vue.set(this.orderCart[this.orderCart.length - 1], 'quantity', 0);
          this.moreDish(dish);
          this.priceTotal();
        }
      },

      minusDish(item) {
        if (item.quantity <= 1) {
          item.quantity = 1
        }else{
          item.quantity -= 1;
          item.totalDishPrice -= item.price;
        }
        this.priceTotal();
        this.totalDishPrice();
      },

      moreDish(item) {
        item.quantity += 1;
        item.totalDishPrice += item.price;
        this.priceTotal();
        this.totalDishPrice();
      },

      totalDishPrice() {
        Vue.set(this.orderCart[this.orderCart.length - 1], 'totalDishPrice', 0);
        this.orderCart[this.orderCart.length - 1].totalDishPrice += this.orderCart[this.orderCart.length - 1].price * this.orderCart[this.orderCart.length - 1].quantity;
      },

      deleteDish(index){
        for (let i = 0; i < this.orderCart.length; i++) {
          if (i == index) {
            this.orderCart.splice(index,1);
          }
          this.priceTotal();
        }
      },

      priceTotal(){
        this.totalPrice = 0;
          this.orderCart.forEach((elem) => {
            this.totalPrice += elem.price * elem.quantity;
          });
      },

      loadCategories () {
        axios.get('/api/categories')
        .then((response) => {
          this.categories = response.data.data;
        })
      },

      loadRestaurants () {
        axios.get('/api/restaurants',
          { params: { categories_rest: this.categories_rest} })
          .then((response) => {
          this.restaurants = response.data.data;
        })
      }
    },
    
});
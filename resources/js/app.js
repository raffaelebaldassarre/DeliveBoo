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
      restaurants: '',
      categories: '',
      categories_rest: [],
      orderCart: [],
      totalPrice: '',
      restaurantNow: 0,
      contenitore: 0,
      restaurantId: '',
    },

    mounted() {
      this.loadCategories();
      this.loadRestaurants();

      this.orderCart = JSON.parse(localStorage.getItem('Cart') || '[]');
      this.totalPrice = localStorage.getItem ('cartTotalPrice' || '');
      console.log(this.totalPrice);

      this.matchRestaurant();
    },

    watch: {
      categories_rest: {
        handler() {
          this.loadCategories();
          this.loadRestaurants();
        },
      },
    },

    methods:{

      matchRestaurant() {
        this.restaurantId = parseInt(document.getElementById('rest_id').textContent)
        console.log(this.restaurantId);
        this.restaurantNow = this.orderCart[0].restaurant_id;
        console.log(this.restaurantNow);
  
        if(this.restaurantNow != this.restaurantId){
          this.orderCart = [];
          this.totalPrice = 0;
          window.localStorage.clear();
        }
      },

      takeOrder(dish) {
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
        this.localStorage();
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
        this.localStorage();
      },

      moreDish(item) {
        item.quantity += 1;
        item.totalDishPrice += item.price;
        this.priceTotal();
        this.totalDishPrice();
        this.localStorage();
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
        this.localStorage();
        
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
      },

      setCookie(name,value,days){
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
     },
     
      localStorage(){
        window.localStorage.setItem('Cart', JSON.stringify(this.orderCart));
        window.localStorage.setItem('cartTotalPrice', this.totalPrice);
        let myItem = localStorage.getItem('Cart');
        this.setCookie('cookieCart', myItem, 7)
      }
    }
});

$("#carousel-example").on("slide.bs.carousel", function(e) {
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 5;
  var totalItems = $(".carousel-item").length;

  if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
          // append slides to end
          if (e.direction == "left") {
              $(".carousel-item")
                  .eq(i)
                  .appendTo(".carousel-inner");
          } else {
              $(".carousel-item")
                  .eq(0)
                  .appendTo(".carousel-inner");
          }
      }
  }
});

/* $(function () {

  $(window).scroll(function () {
  if ($(window).scrollTop() >= 650) {
    $("#filippo").css('background','#221F20');
  } else {
    $("#filippo").css('background','blue');
  }
});

}); */

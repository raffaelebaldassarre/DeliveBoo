<!-- <div class="container">
  <div class="row">
    <div class="col-lg-12 mb-4 ">
      <h3 class="mt-5 center">Scegli tra le categorie</h3>
      <div class="carousel">
        <div class="prev sx" @click="prev">
          <i class="fas fa-angle-left"></i>
        </div>
        <div class="category-carousel">
          <div class="cat" v-for="(category, index) in categories" :class="(index === counter || index === counter +1 || index === counter +2 || index === counter +3 || index === counter +4) ? 'carta' : 'none'">

            <label class="form-check-label" :for="'category' + index">
              <img class="img-cat" src="{{asset('images/americanfood.jpg')}}" alt="">
              @{{ category.name }}
            </label>
            <input class="input none" type="checkbox" :value="category.id" :id="'category'+index" v-model="categories_rest">
          </div>
       </div>

        <div class="next dx" @click="next">
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div> -->


    <div class="col-lg-12">
      <h3 class="text-cnt">La tua ricerca ha trovato: @{{restaurants.length}} ristoranti</h3>
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mb-4" v-for="restaurant in restaurants">
          <a :href="'restaurant/' + restaurant.slug">
            <div class=" h-100 relative">
              <img class="card-img-top card-foto" :src="`storage/${restaurant.image}`" alt="">
              <div class="card-body none">
                <h4 class="card-title">
                  <p class="text-cnt uppercase ">@{{ restaurant.name }}</p>
                  <li v-for="category in restaurant.categories">@{{category.name}}</li>
                </h4>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

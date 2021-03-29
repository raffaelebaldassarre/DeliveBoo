@extends('layouts.app')

@section('header')
    @include('layouts.guests.header')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h3 class="mt-2 text-center">Scegli tra queste categorie di cucina</h3>
                
                <!-- Top content -->
                <div class="top-content">
                    <div class="container-fluid">
                        <div id="carousel-example" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3" :class="index==0 ? 'active' : '' " v-for="(category, index) in categories">
                                    <input class="form-check-input d-none" type="checkbox" :value="category.id" :id="'category'+index" v-model="categories_rest">
                                    <label class="form-check-label" :for="'category' + index">
                                        <img :src="`images/categories_foto/${category.name}.jpg`" class="img-fluid mx-auto d-block" alt="">
                                        <p class="text-center"> @{{ category.name }} </p>
                                    </label>
                                </div>
                            </div>
                            <a id="prev" class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                              <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>
                            <a id="next" class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                              <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- restaurants list --}}
            <div class="col-lg-12 ristoranti">
                <h3 class="text-center" :class="categories_rest.length > 0 ? 'd-block':'d-none'">La tua ricerca ha trovato: @{{restaurants.length}} ristoranti</h3>
                <div class="row mt-4">
                  <div class="col-lg-4 col-md-6 mb-4" v-for="restaurant in restaurants" >
                    <a :href="'restaurant/' + restaurant.slug" class="text">
                      <div class=" h-100 relative">
                        <img class="card-img-top card-foto" :src="`storage/${restaurant.image}`" alt="">
                        <div class="card-body">
                          <h4 class="card-title">
                            <p class="text-center">@{{ restaurant.name }}</p>
                            <li v-for="category in restaurant.categories">@{{category.name}}</li>
                          </h4>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            {{-- restaurants list --}}

        </div>
    </div>
        

@endsection

@extends('layouts.app')

@section('header')
    @include('layouts.guests.header')
@endsection

@section('content')

    <h1>DeliveBoo</h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h3 class="mt-2">Scegli tra le categorie</h3>
                
                <!-- Top content -->
                <div class="top-content">
                    <div class="container-fluid">
                        <div id="carousel-example" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3" :class="index==0 ? 'active' : '' " v-for="(category, index) in categories">
                                    <input class="form-check-input d-none" type="checkbox" :value="category.id" :id="'category'+index" v-model="categories_rest">
                                    <label class="form-check-label" :for="'category' + index">
                                        <img src="//placehold.it/600x400/000/fff?text=1" class="img-fluid mx-auto d-block" alt="img1">
                                        @{{ category.name }}
                                    </label>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- restaurants list --}}
            <div class="col-lg-12">
                <h3 class="text-cnt">La tua ricerca ha trovato: @{{restaurants.length}} ristoranti</h3>
                <div class="row mt-4">
                  <div class="col-lg-4 col-md-6 mb-4" v-for="restaurant in restaurants" >
                    <a :href="'restaurant/' + restaurant.slug">
                      <div class=" h-100 relative" style="border: 1px solid black">
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
            {{-- restaurants list --}}

        </div>
    </div>
        

@endsection
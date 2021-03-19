@extends('layouts.app')

@section('content')

<h1>DeliveBoo</h1>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h3 class="mt-2">Scegli tra le categorie</h3>
            <div class="form-check d-inline-flex" v-for="(category, index) in categories">
                <input class="form-check-input" type="checkbox" :value="category.id" :id="'category'+index" v-model="categories_rest">
                <label class="form-check-label" :for="'category' + index">
                    @{{ category.name }}
                </label>
            </div>
        </div>
        <div class="col-lg-12">
            <h3>La tua ricerca ha trovato: @{{restaurants.length}} ristoranti</h3>
            <div class="row mt-4">
                <div class="col-lg-4 col-md-6 mb-4" v-for="restaurant in restaurants">
                    <div class="card h-100">
                        <a href="#">
                            <img class="card-img-top" :src="`storage/${restaurant.image}`" alt="">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a :href="'/guests/restaurant/' + restaurant.slug">@{{ restaurant.name }}</a>
                                <li v-for="category in restaurant.categories">@{{category.name}}</li>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection

@extends('layouts.app')

@section('content')

<h1>DeliveBoo</h1>

<div class="container" :class="{'loading': loading}">
    <div class="row">
        <div class="col-lg-3 mb-4">
            <h1 class="mt-4">Filters</h1>

            <h3 class="mt-2">Categories</h3>
            <div class="form-check" v-for="(category, index) in categories">
                <input class="form-check-input" type="checkbox" :value="category.id" :id="'category'+index" v-model="selected.categories">
                <label class="form-check-label" :for="'category' + index">
                    @{{ category.name }} (@{{ category.restaurants_count }})
                </label>
            </div>

        </div>
        <div class="col-lg-9">
            <div class="row mt-4">
                <div class="col-lg-4 col-md-6 mb-4" v-for="restaurant in restaurants">
                    <div class="card h-100">
                        <a href="#">
                            <img class="card-img-top" src="http://placehold.it/700x400" alt="">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">@{{ restaurant.name }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection
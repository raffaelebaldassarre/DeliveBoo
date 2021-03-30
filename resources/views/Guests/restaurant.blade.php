@extends('layouts.app')

@section('content')
<div class="col-lg-12 magally">
  <div id="app">

    <div class="d-flex flex-wrap" style="max-height: 400px">
      <div class="img-rist">
        <img class="card-img-top" src="{{asset('storage/' . $restaurant->image)}}" id="img-rest">
      </div>
      <div class="text-center align-self-center d-flex info-rest-container">
        <div id="info-rest">
          <h2>{{ $restaurant->name }}</h2>
          <h5>{{ $restaurant->address }}</h5>
          <h5>{{ $restaurant->phone_number }}</h5>
          <h5> Categorie: </h5>
          <h6>
            @foreach ($restaurant->categories as $category)
                 {{$category->name}},
            @endforeach
        </h6>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
      <h1 class="margin-tb-30 text-center">I NOSTRI PIATTI</h1>
    </div>
    <h3 id="rest_id" class="none">{{ $restaurant->id }}</h3>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 d-flex just-con-bet ">
          @foreach ($dishes as $dish)
          <div class="dish-card">
            <div class="img-cont">
              <img src="{{asset('storage/' . $dish->cover)}}" class="card-img-top dish" alt="...">
            </div>
            <div class="arancio">
              <p class="txt-cnt title">{{ $dish->name }}</p>
              <p style="font-size: 90%">Ingredienti: {{ $dish->ingredients }}</p>
              <p>Prezzo: {{ $dish->price }} €</p>
              <p>Allergeni: {{ $dish->allergens }}</p>
              <p class="txt-cnt"><button type="button" class="btn btn-primary" @click="takeOrder({{$dish}})">Ordina</button></p>
            </div>
          </div>
          @endforeach
        </div>

        <div id="cart" class="col-lg-4 col-md-12 col-sm-offset-2 col-sm-8 cart-pos">
          <div  class="cart">
            <h3 v-if="orderCart.length > 0 || orderCart.length != ''">Il tuo carrello</h3>
            <h3 v-if="orderCart.length == '' || orderCart.lenght == 0">Il tuo carrello è vuoto</h3>
            <div class="single-item" v-for="(item, index) in orderCart">
              <p>Piatto: @{{item.name}}</p>
              <div class="">
                <button id="minus" class="btn btn-outline" @click="minusDish(item)"><i class="fas fa-minus"></i></button>
                <span class="quantity">Quantità: @{{item.quantity}}</span>
                <button id="plus"  class="btn btn-outline" @click="moreDish(item)"><i class="fas fa-plus"></i></button>
              </div>
              <button id="trash" class="btn btn-outline" @click="deleteDish(index)" class="btn-danger delete"><i class="fas fa-trash-alt"></i></button>
              <p>Totale piatto: @{{item.totalDishPrice}} €</p>
              <hr>
            </div>
            <p v-if="orderCart.length == '' || orderCart.lenght == 0">Scegli qualcosa dal menù</p>
            <h3 v-if="orderCart.length > 0 || orderCart.length != ''">Prezzo Totale: @{{totalPrice}} €</h3>
            <a href="{{route ('cart.index', ['slug' => $restaurant->slug]) }}" v-if="orderCart.length > 0 || orderCart.length != ''"><button type="button" class="btn btn-primary">Checkout</button></a>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

@endsection

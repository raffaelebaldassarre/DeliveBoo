@extends('layouts.app')

@section('content')




        <!-- **************** prova pagina ******************* -->
        <div class="text-center">
            <img class="card-img-top" src="{{asset('storage/' . $restaurant->image)}}" style=" width:80%; height: 40%;">
        </div>
        <h1 class="margin-tb-30">I NOSTRI PIATTI</h1>
        <h3 id="rest_id" class="none">{{ $restaurant->id }}</h3>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 d-flex just-con-bet">
              @foreach ($dishes as $dish)
              <div class="dish-card" style="width: 18rem;">
                <div class="img-cont">
                  <img src="{{asset('storage/' . $dish->cover)}}" class="card-img-top dish" alt="...">
                </div>
                <ul class="list-group list-group-flush arancio">
                  <li class="list-group-item txt-cnt title">{{ $dish->name }}</li>
                  <li class="list-group-item">Ingredienti: {{ $dish->ingredients }}</li>
                  <li class="list-group-item">Prezzo: {{ $dish->price }} €</li>
                  <li class="list-group-item">Allergeni: {{ $dish->allergens }}</li>
                  <li class="list-group-item txt-cnt"><button type="button" class="btn btn-primary" @click="takeOrder({{$dish}})">Ordina</button></li>
                </ul>
              </div>
              @endforeach
            </div>

            <div id="cart" class="col-lg-4 col-md-4 col-sm-12 cart-pos">
              <div  class="cart">
                <h3>Il tuo carrello</h3>
                <div class="single-item" v-for="(item, index) in orderCart">
                  <p>Piatto: @{{item.name}}</p>
                  <button id="minus" @click="minusDish(item)">-</button>
                  <span class="quantity">Quantità: @{{item.quantity}}</span>
                  <button id="plus"  @click="moreDish(item)">+</button>
                  <button id="trash" @click="deleteDish(index)" class="btn-danger delete"><i class="fas fa-trash-alt"></i></button>
                  <p>Totale piatto: @{{item.totalDishPrice}} €</p>
                  <hr>
                </div>
                <h3>Prezzo Totale: @{{totalPrice}} €</h3>
                <a href="{{route ('cart.index', ['slug' => $restaurant->slug]) }}" v-if="orderCart.length > 0 || orderCart.length != ''"><button type="button" class="btn btn-primary">Checkout</button></a>
              </div>
            </div>

          </div>

        </div>

        @endsection

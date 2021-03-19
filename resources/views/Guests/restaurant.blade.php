@extends('layouts.app')

@section('content')
        <div class="text-center">
            <img class="card-img-top" src="{{asset('storage/' . $restaurant->image)}}" style=" width:400px;">
        </div>
        <h1>I NOSTRI PIATTI</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ingredienti</th>
                    <th>Prezzo</th>
                    <th>Disponibilità</th>
                    <th>Allergeni</th>
                    <th>Cover</th>
                    <th>Ordina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                <tr>
                    <td scoper="row">{{ $dish->id }}</td>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->ingredients }}</td>
                    <td>{{ $dish->price }} €</td>

                    {{-- <td>
                        @if($dish->available == 1)
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                        @else
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        @endif
                    </td> --}}
                    @if ($dish->available == 1)
                        <td>Disponibile</td>
                    @else
                        <td>Non disponibile</td>
                    @endif

                    <td>{{ $dish->allergens }}</td>
                    <td><img src="{{asset('storage/' . $dish->cover)}}" alt="" style="height: 150px"></td>
                    <td><button type="button" class="btn btn-primary" @click="takeOrder({{$dish}})">Ordina</button></td>
                </tr>

                @endforeach
            </tbody>
        </table>

        <div id="cart" style="display: none">
            <ul>
                <li class="d-flex" v-for="(item, index) in orderCart">
                    <button id="minus" @click="minusDish(item)">-</button>
                    @{{item.name}}
                    <button id="plus" @click="moreDish(item)">+</button>
                    @{{item.quantityOrdered}}
                    <h4>@{{item.totalDishPrice}}</h4>
                </li>
            </ul>
            <h3>@{{totalPrice}}</h3>
        </div>
@endsection

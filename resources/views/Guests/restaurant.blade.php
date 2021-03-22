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

        <div v-if="totalPrice != 0">
            <table class="table">
                <thead>
                    <tr>
                        <th>                    
                            Piatto
                        </th>
                        <th>Quantità</th>
                        <th>Prezzo totale per piatto</th>
                    </tr>
                </thead>
                <tbody v-for="(item, index) in orderCart">
                    <tr>
                        <td scope="row">@{{item.name}}</td>
                        <td>@{{item.quantity}}</td>
                        <td>@{{item.totalDishPrice}} €</td>
                        <td>                            
                            <button id="minus" @click="minusDish(item)">-</button>
                            <button id="plus" @click="moreDish(item)">+</button>
                            <button id="trash" @click="deleteDish(index)" class="btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h3>Prezzo Totale: @{{totalPrice}} €</h3>
            <button type="button" class="btn btn-danger">Chekout</button>
        </div>
@endsection

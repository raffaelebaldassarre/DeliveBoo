@extends('layouts.app')

@section('content')
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
    <h3 v-if="totalPrice != 0">Prezzo Totale: @{{totalPrice}} €</h3>
@endsection
@extends('layouts.app')

@section('content')
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
                </tr>

                @endforeach
            </tbody>
        </table>
@endsection

@extends('layouts.dashboard')

@section('content')

    <div class="images d-flex">
        <img src="{{asset('storage/' . $dish->cover)}}" alt="" style="height: 250px">
    </div>
    
    <h1>Nome Attività: {{$dish->name}}</h1>

    
    <h3>Ingredienti: {{$dish->ingredients}}</h3>
    <h3>Prezzo: {{$dish->price}} €</h3>

    @if ($dish->available == 1)
        <h3>Disponibile</h3>
    @else
        <h3>Non disponibile</h3>
    @endif

    <h3>Allergeni: {{$dish->allergens}}</h3>
    
    

    <a href="{{-- {{route('admin.dishes.edit', ['restaurant' => $restaurant->slug])}} --}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i></a>

@endsection
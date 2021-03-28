@extends('layouts.dashboard')

@section('sideMap')
<div class="col-xs-12 col-md-3 col-lg-2">
    <a href="{{ route('admin.restaurants.index')}}"><i class="fas fa-utensils"></i> Ristoranti</a><br>
    <a href="{{route('admin.dishes.index', ['slug' => $restaurant->slug])}}"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i>Visualizza i piatti del tuo ristorante</a>
</div>
@endsection

@section('content')

    <div class="images d-flex">
        <img src="{{asset('storage/' . $dish->cover)}}" alt="" style="height: 250px">
    </div>
    
    <h1>Nome Piatto: {{$dish->name}}</h1>

    
    <h3>Ingredienti: {{$dish->ingredients}}</h3>
    <h3>Prezzo: {{$dish->price}} €</h3>

    @if ($dish->available == 1)
        <h3>Disponibile</h3>
    @else
        <h3>Non disponibile</h3>
    @endif

    <h3>Allergeni: {{$dish->allergens}}</h3>
    
    

    <a href="{{route('admin.dishes.edit', ['slug' => $restaurant->slug, 'dish' => $dish->id])}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i>Modifica Piatto</a>

@endsection
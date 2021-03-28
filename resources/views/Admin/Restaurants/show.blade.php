@extends('layouts.dashboard')

@section('sideMap')
<div class="col-xs-2 col-md-3 col-lg-2" id="sidemap">
    <a href="{{ route('admin.restaurants.index')}}"><i class="fas fa-utensils"></i> Ristoranti</a>
</div>
@endsection

@section('content')

<div id="show_rest_container">
    <div class="images d-flex">
        <img src="{{asset('storage/' . $restaurant->image)}}" alt="" style="height: 250px">
    </div>
    <div id="single_rest_show">
        <h1>Nome Attività: {{$restaurant->name}}</h1>
    
        
        <h3>Indirizzo: {{$restaurant->address}}</h3>
        <h3>Numero di telefono: {{$restaurant->phone_number}}</h3>
        
        <h3> Categorie:
            @foreach ($restaurant->categories as $category)
                 {{$category->name}}
            @endforeach
        </h3>
    
        <a href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->slug])}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i></a>
        <a href="{{route('admin.dishes.index', ['slug' => $restaurant->slug])}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i>Visualizza i piatti del tuo ristorante</a>
    </div>
</div>
    

@endsection
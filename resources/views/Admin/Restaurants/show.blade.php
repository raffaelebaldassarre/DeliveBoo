@extends('layouts.dashboard')

@section('content')

    <div class="images d-flex">
        <img src="{{asset('storage/' . $restaurant->image)}}" alt="" style="height: 250px">
    </div>
    
    <h1>Nome Attività: {{$restaurant->name}}</h1>

    
    <h3>Indirizzo: {{$restaurant->address}}</h3>
    <h3>Numero di telefono: {{$restaurant->phone_number}}</h3>
    
    <h3> Categorie:
        @foreach ($restaurant->categories as $category)
             {{$category->name}}
        @endforeach
    </h3>

    <a href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->slug])}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i></a>
    
@endsection
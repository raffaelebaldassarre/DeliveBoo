@extends('layouts.dashboard')

@section('content')
        <h1>I MIEI RISTORANTI</h1>
        <a name="" id="" class="btn btn-primary" href="{{route('admin.restaurants.create')}}" role="button">INSERISCI UN NUOVO RISTORANTE</a>
                
        <div class="adm_rest_container d-flex">
            @foreach ($restaurants as $restaurant)   
                <div class="col-lg-4 col-md-6 mb-4">
                      <div class=" h-100 relative">
                        <img src="{{asset('storage/' . $restaurant->image)}}" alt="" style="height: 150px">
                        <div class="card-body">
                          <h4 class="card-title">
                            <p class="text-center text-uppercase ">{{ $restaurant->name }}</p>
                            <p class="text-center text-uppercase ">{{ $restaurant->address }}</p>
                            <p class="text-center text-uppercase ">{{ $restaurant->phone_number }}</p>
                          </h4>
                          <div class="adm_rest_btn d-flex">
                            <a href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}" class="btn btn-primary"><i class="fas fa-eye fa-xs fa-fw"></i></a>
                            <a href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->slug])}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i></a>
                            <a href="{{route('admin.dishes.index', ['slug' => $restaurant->slug])}}" class="btn btn-warning"><i class="fas fa-utensils fa-xs fa-fw"></i></a>
                            <a href="{{route('admin.orders.index', ['slug' => $restaurant->slug])}}" class="btn btn-warning"><i class="fas fa-book fa-xs fa-fw"></i></a>
                            <a href="{{route('admin.charts', ['slug' => $restaurant->slug])}}" class="btn btn-warning"><i class="fas fa-chart-line"></i></a>
                            
                          </div>
                        </div>
                      </div>
                  </div>
            @endforeach
        </div>
        


        <div class="col-sm-12">

            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @endif

        </div>
@endsection
@extends('layouts.dashboard')

@section('content')

    <div class="adm_rest_index_insert text-center mt-4">
      <h1 class="mt-5">I MIEI RISTORANTI</h1>
      <a name="" id="" class="btn btn-primary" href="{{route('admin.restaurants.create')}}" role="button">INSERISCI UN NUOVO RISTORANTE</a>
    </div>
    
              
      <div class="adm_rest_container d-flex flex-wrap">
          @foreach ($restaurants as $restaurant)   
              <div class="col-lg-4 col-md-6 mb-4">
                    <div class=" h-100 relative">
                      <img src="{{asset('storage/' . $restaurant->image)}}" alt="" style="height: 150px">
                      <div class="card-body">
                        <h4 class="card-title">
                          <p class="text-center">{{ $restaurant->name }}</p>
                          <p class="text-center">{{ $restaurant->address }}</p>
                          <p class="text-center">{{ $restaurant->phone_number }}</p>
                        </h4>
                        <div class="adm_rest_btn d-flex flex-wrap">
                          <a id="btn-rest" href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}" class="btn btn-primary" style="padding: 5px; margin-right: 3px; margin-bottom: 5px"><i class="fas fa-eye fa-xs fa-fw"></i> INFO SUL RISTO</a>
                          <a id="edit-rest" href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->slug])}}" class="btn btn-primary" style="padding: 5px; margin-bottom: 5px"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i>MODIFICA RISTO</a>
                          <a id="index-dish" href="{{route('admin.dishes.index', ['slug' => $restaurant->slug])}}" class="btn btn-primary" style="padding: 5px; margin-right: 3px; margin-bottom: 5px"><i class="fas fa-utensils fa-xs fa-fw"></i>VEDI IL MENU'</a>
                          <a id="index-order" href="{{route('admin.orders.index', ['slug' => $restaurant->slug])}}" class="btn btn-primary" style="padding: 5px; margin-bottom: 5px"><i class="fas fa-book fa-xs fa-fw"></i>VEDI GLI ORDINI</a>
                          <a id="show-chart" href="{{route('admin.charts', ['slug' => $restaurant->slug])}}" class="btn btn-primary text-center" style="padding: 5px; margin-bottom: 5px><i class="fas fa-chart-line"></i>VEDI LE STATISTICHE</a>
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
@extends('layouts.dashboard')

@section('content')



    <h1>Nome Cliente: {{$order->name}} {{$order->lastname}}</h1>
    <h3>Indirizzo: {{$order->address}}</h3>
    <h3>Numero di telefono: {{$order->phone_number}}</h3>
    <h3>Lista Piatti Ordinati: </h3>
    <ul>
      @foreach($dishes as $dish)
      <li>{{$dish->name}}</li>
      @endforeach
    </ul>
    @if($order->special_requests)
    <h3>Richieste Speciali: {{$order->special_requests}}</h3>
    @endif

    <h3>Orario Ordine: {{$order->created_at}}</h3>
    <h3>Orario Consegna: {{$order->exp_date}}</h3>
    @if($order->payment_id)
    <h3>Metodo di Pagamento: {{$order->payment_id }}</h3>
    @endif








    <a href="{{route('admin.orders.index', ['slug'=> $restaurant->slug])}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i>Visualizza gli ordini del tuo ristorante</a>

@endsection

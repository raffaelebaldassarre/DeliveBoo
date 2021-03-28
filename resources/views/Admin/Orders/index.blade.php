@extends('layouts.dashboard')

@section('sideMap')
<div class="col-xs-12 col-md-3 col-lg-2">
    <a href="{{ route('admin.restaurants.index')}}"><i class="fas fa-utensils"></i> Ristoranti</a>
</div>
@endsection

@section('content')
        <h1>I MIEI ORDINI</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Richieste Speciali</th>
                    <th>Orario Consegna</th>
                    <th>Nome Cliente</th>
                    <th>Cognome Cliente</th>
                    <th>Indirizzo</th>
                    <th>Numero Telefono</th>
                    <th>Metodo di Pagamento</th>
                    <th>Orario Ordine</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td scoper="row">{{ $order->id }}</td>
                    <td>{{ $order->special_requests }}</td>
                    <td>{{ $order->exp_date }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->lastname }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone_number }}</td>
                    <td>{{ $order->payment_id }}</td>
                    <td>{{ $order->created_at }}</td>



                    <td>
                        <a href="{{route('admin.orders.show', ['slug'=> $restaurant->slug, 'order'=> $order->id])}}" class="btn btn-primary"><i class="fas fa-eye fa-xs fa-fw"></i></a>



                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12">

            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @endif

        </div>
@endsection

@extends('layouts.app')

@section('content')
    <table class="table">
        <h3 id="rest_id" class="d-none">{{ $restaurant->id }}</h3>
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
                    <button id="minus" class="btn btn-outline-primary" @click="minusDish(item)">-</button>
                    <button id="plus" class="btn btn-outline-primary" @click="moreDish(item)">+</button>
                    <button id="trash" @click="deleteDish(index)" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    <h3 v-if="totalPrice != 0">Prezzo Totale: @{{totalPrice}} €</h3>

    <div class="col-lg-6 p-0">
        <h3 class="py-3">Inserisci i tuoi dati per la consegna</h3>
        <form action="{{route('cart.store')}}" method="post">
    
            @csrf
    
            {{-- NOME --}}
            <div class="form-group">
                <label for="name">NOME</label>
                <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            {{-- COGNOME --}}
            <div class="form-group">
                <label for="lastname">COGNOME</label>
                <input class="form-control" type="text" name="lastname" id="lastname" value="{{old('lastname')}}">
            </div>
            @error('lastname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            {{-- INDIRIZZO --}}
            <div class="form-group">
                <label for="address">INDIRIZZO</label>
                <input class="form-control" type="text" name="address" id="address" value="{{old('address')}}">
            </div>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            {{-- NUMERO DI TELEFONO --}}
            <div class="form-group">
                <label for="phone_number">NUMERO DI TELEFONO</label>
                <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{old('phone_number')}}">
            </div>
            @error('phone_number')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            {{-- RICHIESTE SPECIALI --}}
            <div class="form-group">
                <label for="special_requests">RICHIESTE SPECIALI</label>
                <input class="form-control" type="text" name="special_requests" id="special_requests" value="{{old('special_requests')}}">
            </div>
            @error('special_requests')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <button type="submit" class="btn btn-outline-success btn-lg">Submit</button>
        </form>
    </div>
@endsection

@section('payment')

<div id="dropin-wrapper">
    <div id="checkout-message"></div>
    <div style="width:60%; margin:auto;">
      <div id="dropin-container"></div>
    </div>
    <button style="background-color:yellow" id="submit-button">Submit payment</button>
  </div>


 <script>
   var button = document.querySelector('#submit-button');

   braintree.dropin.create({
     authorization: "sandbox_zjph3bx7_x2h6cngzkjxbdss9",
     container: '#dropin-container'
   }, function (createErr, instance) {
     button.addEventListener('click', function () {
       instance.requestPaymentMethod(function (err, payload) {
         $.get('{{ route("payment.process") }}', {payload}, function (response) {
           if (response.success) {
             alert('Payment successfull!');
           } else {
             alert('Payment failed');
           }
         }, 'json');
       });
     });
   });
 </script>
    
@endsection
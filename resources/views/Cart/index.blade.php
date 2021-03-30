@extends('layouts.app')

@section('content')

    <div class="text-center col-lg-7 magally">
        <div id="app">
            <div class="receipt_container bg-white">
                <h3 id="rest_id" class="d-none">{{ $restaurant->id }}</h3>
                <h2 class="py-2">Riepilogo Ordine:</h2>
                <div>
                    <div class="d-flex flex-column justify-content-center">                            
                        <div v-for="(item, index) in orderCart">
                            <div class="d-flex justify-content-center align-items-center my-1">
                                <button id="minus" class="btn btn-outline" @click="minusDish(item)"><i class="fas fa-minus"></i></button>
                                <div id="food-check">@{{item.quantity}}x @{{item.name}} &rArr; @{{item.totalDishPrice}} €</div>
                                <button id="plus" class="btn btn-outline" @click="moreDish(item)"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="d-flex justify-content-center my-2">
                                <button id="trash" class="btn btn-outline"
                                @click="deleteDish(index)" class="btn-danger delete"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h2 class="py-2" v-if="totalPrice != 0">Prezzo Totale: @{{totalPrice}} €</h2>
            </div>
        </div>
    </div>
@endsection

@section('payment')

    <div class="col-lg-5 magally">
        <div class="receipt_container text-center bg-white">
            <h3 class="text-center py-3">Inserisci i tuoi dati per la consegna</h3>
            <form action="{{route('cart.store')}}" method="post" id="payment-order-user" name="payment-order-user" onsubmit="testform">
    
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
                
                {{-- EMAIL --}}
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
                </div>
                @error('email')
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
    
                <div id="dropin-wrapper">
                    <div id="checkout-message"></div>
                    <div {{-- style="width:60%; margin:auto;" --}}>
                        <div id="dropin-container"></div>
                    </div>
                    <button id="submit-button" class="btn btn-lg btn-outline font-weight-bold p-4">Procedi al pagamento</button>
                </div>
                
                
                    <script>
                    
                    var form = document.getElementById('payment-order-user');
                    /* var button = document.querySelector('#submit-button'); */
                
                    braintree.dropin.create({
                        authorization: "sandbox_zjph3bx7_x2h6cngzkjxbdss9",
                        container: '#dropin-container'
                    }, function (createErr, instance) {
                        form.addEventListener('submit', function () {
                        var name = document.getElementById("name").value;
                        var lastname = document.getElementById("lastname").value;
                        var phone_number = document.getElementById("phone_number").value;
                        var email = document.getElementById("email").value;
                        var address = document.getElementById("address").value;
                        if (name === '' || lastname === '' || phone_number === '' || email === '' || address === '')
                        {
                            alert("Inserisci tutti i dati richiesti per la spedizione");
                            return false;
                        } else {
                            event.preventDefault();
                        }
                        instance.requestPaymentMethod(function (err, payload) {
                            $.get('{{ route("payment.process") }}', {payload}, function (response) {
                            if (response.success) {
                                localStorage.clear();
                                alert('Pagamento completato con successo!!!');
                                form.submit();
                            } else {
                                alert('Pagamento fallito, controlla i dati inseriti o verifica la validità della tua carta.');
                            }
                            }, 'json');
                        });
                        });
                    });
                    
    
                    function testform()
                    {
                        
                    }
                    </script>
                
            </form>
        </div>
    </div>
    
@endsection



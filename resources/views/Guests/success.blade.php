@extends('layouts.app')

@section('content')
<div id="success_container" class="text-center col-lg-12">
    <img src="{{asset('images/logogif.gif')}}" alt=""> 
        <h1 class="my-4">Grazie per il tuo ordine!</h1> 
        <p>A breve riceverai una e-mail con il riepilogo dell'ordine.</p> 
        <a href="{{ url('/') }}" class="btn btn-lg btn-outline font-weight-bold p-4">Torna all'home page per effettuare un nuovo ordine</a>
    </div>
@endsection
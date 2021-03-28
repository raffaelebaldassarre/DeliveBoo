@extends('layouts.app')

@section('content')
<div id="success_container" class="text-center">
    <img src="http://127.0.0.1:8000/images/logogif.gif" alt="" class="my-5"> 
        <h1 class="my-4">Grazie per il tuo ordine!</h1> 
        <p>L'ordine eseguito n° 36 è andato a buon fine.</p> 
        <p><strong>Controlla nella tua mail.</strong></p> 
        <a href="http://127.0.0.1:8000" class="btn btn-lg btn-outline font-weight-bold p-4">Torna all'home page per mangiare ancora!</a>
    </div>
@endsection
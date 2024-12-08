@component('mail::message')
Ciao, <h3>{{$order->name}} {{$order->lastname}}</h3>

<strong> 🎉 Il tuo ordine è stato confermato 🎉 </strong> 

<div style="text-align: center">
    <img src="{{asset('storage/' . $order->restaurant->image)}}" alt="" style="height: 100px; border-radius: 20%">
    <br>
    <strong>{{$order->restaurant->name}}</strong>
    <br>
    <small>{{$order->restaurant->address}}</small>
</div>

L'indirizzo di consegna indicato è: <strong>{{$order->address}}</strong>

L'orario di consegna previsto è alle {{ $expDate }}

Ecco il riepilogo del tuo ordine:
<ul>
    @foreach ($order->dishes as $dish)
        <li>{{$dish->pivot->quantity}}x {{$dish->name}} {{$dish->price * $dish->pivot->quantity}}€</li>
    @endforeach
</ul>

Totale: {{ $totalPrice }} €

@component('mail::button', ['url' => config('app.url')])
Hai dimenticato qualcosa?
@endcomponent

Grazie per averci scelto,<br>
{{ config('app.name') }}

@component('mail::subcopy')
Se hai ricevuto questa email per errore, ti preghiamo di contattarci.
@endcomponent
@endcomponent

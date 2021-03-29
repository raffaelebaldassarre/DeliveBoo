@component('mail::message')
Ciao, <h3>{{$order->name}} {{$order->lastname}}</h3>

<strong> Il tuo ordine è stato confermato!! </strong> 

<div style="text-align: center">
    <img src="{{asset('storage/' . $order->restaurant->image)}}" alt="" style="height: 100px; border-radius: 20%">
    <br>
    <strong>{{$order->restaurant->name}}</strong>
    <br>
    <small>{{$order->restaurant->address}}</small>
</div>

L'indirizzo di consegna indicato è: <strong>{{$order->address}}</strong>

L'orario di consegna previsto è alle {{$order->exp_date}}

Ecco il riepilogo del tuo ordine:
<ul>
    @foreach ($order->dishes as $dish)
        <li>{{$dish->pivot->quantity}}x {{$dish->name}} {{$dish->price * $dish->pivot->quantity}}€</li>
    @endforeach
</ul>

@component('mail::button', ['url' => '/'])
Vai sul Sito
@endcomponent

Grazie per averci scelto,<br>
Team4 - {{ config('app.name') }}
@endcomponent

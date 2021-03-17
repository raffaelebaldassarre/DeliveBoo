@extends('layouts.app')

@section('content')
<h1>DeliveBoo</h1>
<ul>
  <li v-for="rest in restaurants">@{{rest.name}}</li>
</ul>
@endsection

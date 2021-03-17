@extends('layouts.app')

@section('content')
<h1>DeliveBoo</h1>
<ul>
  <li v-for="rest in restaurants">@{{rest.name}}</li>
</ul>
<select name="categories_list" id="categories_list" v-model="selectedCat" @change="chooseCategory()" multiple="2">
  @foreach ($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
</select>
@endsection

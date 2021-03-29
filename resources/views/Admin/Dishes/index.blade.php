@extends('layouts.dashboard')

@section('sideMap')
<div class="col-xs-12 col-md-3 col-lg-2" id="sidemap">
    <a href="{{ route('admin.restaurants.index')}}"><i class="fas fa-utensils"></i> Ristoranti</a>
</div>
@endsection

@section('content')
        <h1>I MIEI PIATTI</h1>
        <a name="" id="" class="btn btn-primary" href="{{route('admin.dishes.create', ['slug' => $restaurant->slug])}}" role="button">INSERISCI UN NUOVO PIATTO</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ingredienti</th>
                    <th>Prezzo</th>
                    <th>Disponibilità</th>
                    <th>Allergeni</th>
                    <th>Cover</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                <tr>
                    <td scoper="row">{{ $dish->id }}</td>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->ingredients }}</td>
                    <td>{{ $dish->price }} €</td>

                    {{-- <td>
                        @if($dish->available == 1)
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                        @else
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        @endif
                    </td> --}}
                    @if ($dish->available == 1)
                        <td>Disponibile</td>
                    @else
                        <td>Non disponibile</td>
                    @endif

                    <td>{{ $dish->allergens }}</td>
                    <td><img src="{{asset('storage/' . $dish->cover)}}" alt="" style="height: 150px"></td>



                    <td>
                        <a href="{{route('admin.dishes.show', ['slug' => $restaurant->slug, 'dish' => $dish->id])}}" class="btn btn-primary"><i class="fas fa-eye fa-xs fa-fw"></i></a>
                        <a href="{{route('admin.dishes.edit', ['slug' => $restaurant->slug, 'dish' => $dish->id])}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i></a>
                        <!-- Modal -->
                        <!-- Button trigger modal -->
                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $dish->slug }}"
                            role="button">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="delete-{{ $dish->slug }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Will delete
                                            <em class="font-weight-bold">"{{ $dish->name }}"</em>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        This is irreverisible. Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nooooo</button>
                                        <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Yeah, Delete" class="btn btn-danger">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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

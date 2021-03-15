@extends('layouts.dashboard')

@section('content')
        <h1>I MIEI RISTORANTI</h1>
        <a name="" id="" class="btn btn-primary" href="{{route('admin.restaurants.create')}}" role="button">INSERISCI UN NUOVO RISTORANTE</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Indirizzo</th>
                    <th>Numero di Telefono</th>
                    <th>Immagine</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $restaurant)
                <tr>
                    <td scoper="row">{{ $restaurant->id }}</td>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->address }}</td>
                    <td>{{ $restaurant->phone_number }}</td>
                    <td><img src="{{asset('storage/' . $restaurant->image)}}" alt="" style="height: 150px"></td>

                    {{-- @if ($comic->available == 1)
                        <td>AVAILABLE</td>
                    @else
                        <td>NO AVAILABLE</td>
                    @endif --}}

                    <td>
                        <a href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->slug])}}" class="btn btn-primary"><i class="fas fa-eye fa-xs fa-fw"></i></a>
                        <a href="{{route('admin.restaurants.edit', ['restaurant' => $restaurant->slug])}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i></a>
                        <!-- Modal -->
                        <!-- Button trigger modal -->
                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $restaurant->slug }}"
                            role="button">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="delete-{{ $restaurant->slug }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Will delete
                                            <em class="font-weight-bold">"{{ $restaurant->name }}"</em>
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
                                        <form action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->slug]) }}"
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
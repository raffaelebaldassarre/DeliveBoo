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
                @foreach ($restaurants as $rest)
                <tr>
                    <td scoper="row">{{ $rest->id }}</td>
                    <td>{{ $rest->name }}</td>
                    <td>{{ $rest->address }}</td>
                    <td>{{ $rest->phone_number }}</td>
                    <td>{{ $rest->image }}</td>

                    {{-- @if ($comic->available == 1)
                        <td>AVAILABLE</td>
                    @else
                        <td>NO AVAILABLE</td>
                    @endif --}}

                    <td>
                        <a href="{{-- {{route('admin.comics.show', ['comic' => $comic->slug])}} --}}" class="btn btn-primary"><i class="fas fa-eye fa-xs fa-fw"></i></a>
                        <a href="{{-- {{route('admin.comics.edit', ['comic' => $comic->slug])}} --}}" class="btn btn-warning"><i class="fas fa-pencil-ruler fa-xs fa-fw"></i></a>
                        <!-- Modal -->
                        <!-- Button trigger modal -->
                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $rest->slug }}"
                            role="button">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="delete-{{ $rest->slug }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Will delete
                                            <em class="font-weight-bold">"{{ $rest->name }}"</em>
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
                                        <form action="{{-- {{ route('admin.restaurants.destroy', ['rest' => $rest->slug]) }} --}}"
                                            method="POST">
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

@endsection
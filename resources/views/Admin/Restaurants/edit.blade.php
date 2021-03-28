@extends("layouts.dashboard")

@section('sideMap')
<div class="col-xs-2 col-md-3 col-lg-2" id="sidemap">
    <a href="{{ route('admin.restaurants.index')}}"><i class="fas fa-utensils"></i> Ristoranti</a>
</div>
@endsection

@section("content")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

    <h1>AGGIORNA I DATI DEL RISTORANTE</h1>
    <form action="{{route('admin.restaurants.update', ['restaurant'=> $restaurant->slug])}}" method="post" enctype="multipart/form-data">

        @csrf

        @method("PUT") <!-- passiamo PUT poichè il metodo più indicato per EDIT -->

        {{-- NAME --}}
        <div class="form-group">
            <label for="name">NOME ATTIVITA'</label>
            <input class="form-control" type="text" name="name" id="name" value="{{$restaurant->name}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- INDIRIZZO --}}
        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input class="form-control" type="text" name="address" id="address" value="{{$restaurant->address}}">
        </div>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        {{-- NUMERO DI TELEFONO --}}
        <div class="form-group">
            <label for="phone_number">Numero di Telefono</label>
            <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{$restaurant->phone_number}}">
        </div>
        @error('phone_number')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
          <label for="image">Inserisci una immagine del tuo ristorante</label>
          <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
          <small id="fileHelpId" class="form-text text-muted">Inserisci una immagine del tuo ristorante</small>
        </div>        
        <img src="{{asset('storage/' . $restaurant->image)}}" alt="" style="height: 150px">
        <small>Al momento hai inserito questa immagine</small>

        <br>
        <span>INDICA LA CATEGORIA DELLA TUA CUCINA: </span>
        <div class="form-group">
          <label for="categories"></label>
          <select class="form-control" name="categories[]" id="categories" multiple>
                @foreach ($categories as $cat)
                    <option value="{{$cat->id}}" {{$restaurant->categories->contains($cat) ? 'selected' : ''}}>{{$cat->name}}</option>
                @endforeach
          </select>
        </div>
        @error('categories')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
    
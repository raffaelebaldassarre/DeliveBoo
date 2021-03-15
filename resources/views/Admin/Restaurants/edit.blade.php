@extends("layouts.dashboard")

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

    <h1>INSERISCI UN RISTORANTE</h1>
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
    
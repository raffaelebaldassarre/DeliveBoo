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

    <h1>INSERISCI UN RISTORANTE</h1>
    <form action="{{route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">

        @csrf

        {{-- NAME --}}
        <div class="form-group">
            <label for="name">NOME ATTIVITA'</label>
            <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- INDIRIZZO --}}
        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input class="form-control" type="text" name="address" id="address" value="{{old('address')}}">
        </div>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        {{-- NUMERO DI TELEFONO --}}
        <div class="form-group">
            <label for="phone_number">Numero di Telefono</label>
            <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{old('phone_number')}}">
        </div>
        @error('phone_number')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
          <label for="image">Inserisci una immagine del tuo ristorante</label>
          <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
          <small id="fileHelpId" class="form-text text-muted">Inserisci una immagine del tuo ristorante</small>
        </div>        

        <br>
        <span>INDICA LA CATEGORIA DELLA TUA CUCINA: </span>
        <div class="form-group">
          <label for="categories"></label>
          <select class="form-control" name="categories[]" id="categories" multiple>
                @foreach ($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
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
    
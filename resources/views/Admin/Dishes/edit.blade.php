@extends("layouts.dashboard")

@section('sideMap')
<div class="col-xs-12 col-md-3 col-lg-2" id="sidemap">
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

    <h1 class="mt-5">MODIFICA PIATTO</h1>
    <form class="mb-5" action="{{route('admin.dishes.update', ['dish' => $dish->id])}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PATCH')
        {{-- NAME --}}
        <div class="form-group">
            <label for="name">NOME PIATTO</label>
            <input class="form-control" type="text" name="name" id="name" value="{{$dish->name}}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {{-- INGREDIENTI --}}
        <div class="form-group">
            <label for="ingredients">INGREDIENTI</label>
            <input class="form-control" type="text" name="ingredients" id="ingredients" value="{{$dish->ingredients}}">
        </div>
        @error('ingredients')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        {{-- PREZZO --}}
        <div class="form-group">
            <label for="price">PREZZO</label>
            <input class="form-control" type="text" name="price" id="price" value="{{$dish->price}}">
        </div>
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
          <label for="cover">Inserisci una immagine del tuo piatto</label>
          <input type="file" class="form-control-file" name="cover" id="cover" placeholder="" aria-describedby="fileHelpId">
          <small id="fileHelpId" class="form-text text-muted">Inserisci una immagine del tuo piatto</small>
        </div>        

        <br>
        {{-- AVAILABLE --}}
        <div class="form-group d-flex" id="available-dish">
            <label for="available">Available:</label>
            <input type="radio" class="form-control" id="available" name="available" value="1" {{$dish->available == 1 ? 'checked' : ''}}> <span>TRUE</span> 
            <input type="radio" class="form-control" id="available" name="available" value="0" {{$dish->available == 0 ? 'checked' : ''}}> <span>FALSE</span> 
        </div>
        @error('available')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <br>

        {{-- ALLERGENI --}}
        <div class="form-group">
            <label for="allergens">ALLERGENI</label>
            <input class="form-control" type="text" name="allergens" id="allergens" value="{{$dish->allergens}}">
        </div>
        @error('allergens')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
    
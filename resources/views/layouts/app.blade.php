@include('layouts.guests.head')
@include('layouts.guests.navbar')
@yield('header')

<main id="magalli" class="py-5">
    <div class="container">
        <div class="row">
            @yield('content')
            
            @yield('payment')
        </div>
    </div>
</main>


@include('layouts.guests.footer')


    
    

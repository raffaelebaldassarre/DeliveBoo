@include('layouts.admin.adminhead')
@include('layouts.guests.navbar')

    <div class="admin_wrapper d-flex">
            @yield('sideMap')
            <main class="col-xs-10 col-md-9 col-lg-10" id="admin_various_content">
                @yield('content')
            </main>
    </div>

@include('layouts.guests.footer')

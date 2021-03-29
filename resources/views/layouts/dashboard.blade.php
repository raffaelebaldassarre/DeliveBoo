@include('layouts.admin.adminhead')
@include('layouts.guests.navbar')

    <div class="admin_wrapper d-flex">
                @yield('sideMap')
            <main class="w-75" id="right_admin_content">
                <div class="container">
                    @yield('content')
                </div>
            </main>
    </div>

@include('layouts.guests.footer')

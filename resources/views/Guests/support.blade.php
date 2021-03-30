@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column my-5">
        <h1 class="text-center">Team 4</h1>
        <h4 class="text-center py-3">Boolean - Class#23</h4>
        <div class="col-lg-12 d-flex py-5">
            <div class="support_card">
                <img src="{{asset('images/woman.webp')}}" alt="" class="w-100">
                <div class="overlay d-flex flex-column justify-content-center align-items-center">
                    <h3>Mariapia Gianguzzi</h3>
                    <div class="socials mt-2">
                        <a href="https://github.com/mariapiagianguzzi"><i class="fab fa-github-square"></i></a>
                        <a href="https://www.linkedin.com/in/mariapia-gianguzzi-1747541bb/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="support_card">
                <img src="{{asset('images/woman.webp')}}" alt="" class="w-100">
                <div class="overlay d-flex flex-column justify-content-center align-items-center">
                    <h3>Raffaele Andrea Baldassarre</h3>
                    <div class="socials mt-2">
                        <a href="https://github.com/raffaelebaldassarre"><i class="fab fa-github-square"></i></a>
                        <a href="https://www.linkedin.com/in/raffaeleandrea-baldassarre/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="support_card">
                <img src="{{asset('images/woman.webp')}}" alt="" class="w-100">
                <div class="overlay d-flex flex-column justify-content-center align-items-center">
                    <h3>Alessandro Marzuco</h3>
                    <div class="socials mt-2">
                        <a href="https://github.com/marzucoalessandro"><i class="fab fa-github-square"></i></a>
                        <a href="https://www.linkedin.com/in/alessandro-marzuco-a8a575208/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="support_card">
                <img src="{{asset('images/woman.webp')}}" alt="" class="w-100">
                <div class="overlay d-flex flex-column justify-content-center align-items-center">
                    <h3>William Truppi</h3>
                    <div class="socials mt-2">
                        <a href="https://github.com/williamtruppi"><i class="fab fa-github-square"></i></a>
                        <a href="https://www.linkedin.com/in/william-truppi-779648155/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="support_card">
                <img src="{{asset('images/woman.webp')}}" alt="" class="w-100">
                <div class="overlay d-flex flex-column justify-content-center align-items-center">
                    <h3>Loris Matteri</h3>
                    <div class="socials mt-2">
                        <a href="https://github.com/lorismatteri"><i class="fab fa-github-square"></i></a>
                        <a href="https://www.linkedin.com/in/loris-matteri-13a19615a/"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
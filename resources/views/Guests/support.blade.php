@extends('layouts.app')

@section('content')
    
    <div class="col-lg-12 py-5 magally">
        <h1 class="text-center">Team 4</h1>
        <h4 class="text-center py-3">Boolean - Class#23</h4>
        <div class="support_container d-flex py-5">
            <div class="flip_card">
                <div class="flip_card_inner">
                    <div class="flip_card_front">
                        <img src="{{asset('images/Mariapia.jpg')}}" alt="" class="w-100 h-100">
                    </div>
                    <div class="flip_card_back d-flex flex-column justify-content-center align-items-center">
                        <h3>Mariapia Gianguzzi</h3>
                        <div class="socials mt-2">
                            <a href="https://github.com/mariapiagianguzzi" target="_blank"><i class="fab fa-github-square"></i></a>
                            <a href="https://www.linkedin.com/in/mariapia-gianguzzi-1747541bb/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flip_card">
                <div class="flip_card_inner">
                    <div class="flip_card_front">
                        <img src="{{asset('images/RaffaeleBaldassarre.jpg')}}" alt="" class="w-100 h-100">
                    </div>
    
                    <div class="flip_card_back d-flex flex-column justify-content-center align-items-center">
                        <h3>Raffaele Andrea Baldassarre</h3>
                        <div class="socials mt-2">
                            <a href="https://github.com/raffaelebaldassarre" target="_blank"><i class="fab fa-github-square"></i></a>
                            <a href="https://www.linkedin.com/in/raffaeleandrea-baldassarre/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flip_card">
                <div class="flip_card_inner">
                    <div class="flip_card_front">
                        <img src="{{asset('images/AlessandroMarzuco.jpg')}}" alt="" class="w-100 h-100">
                    </div>
    
                    <div class="flip_card_back d-flex flex-column justify-content-center align-items-center">
                        <h3>Alessandro Marzuco</h3>
                        <div class="socials mt-2">
                            <a href="https://github.com/marzucoalessandro" target="_blank"><i class="fab fa-github-square"></i></a>
                            <a href="https://www.linkedin.com/in/alessandro-marzuco-a8a575208/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flip_card">
                <div class="flip_card_inner">
                    <div class="flip_card_front">
                        <img src="{{asset('images/woman.webp')}}" alt="" class="w-100 h-100">
                    </div>
    
                    <div class="flip_card_back d-flex flex-column justify-content-center align-items-center">
                        <h3>William Truppi</h3>
                        <div class="socials mt-2">
                            <a href="https://github.com/williamtruppi" target="_blank"><i class="fab fa-github-square"></i></a>
                            <a href="https://www.linkedin.com/in/william-truppi-779648155/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flip_card">
                <div class="flip_card_inner">
                    <div class="flip_card_front">
                        <img src="{{asset('images/LorisMatteri.jpg')}}" alt="" class="w-100 h-100">
                    </div>
    
                    <div class="flip_card_back d-flex flex-column justify-content-center align-items-center">
                        <h3>Loris Matteri</h3>
                        <div class="socials mt-2">
                            <a href="https://github.com/lorismatteri" target="_blank"><i class="fab fa-github-square"></i></a>
                            <a href="https://www.linkedin.com/in/loris-matteri-13a19615a/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
@endsection
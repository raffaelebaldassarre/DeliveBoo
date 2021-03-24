<?php

namespace App\Http\Controllers;
use App\Restaurant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $restaurant = Restaurant::where('slug', $request->slug)->first();
        return view('cart.index', compact('restaurant'));
    }

    public function store(Request $request){
        dd($request);
        $dishesList = [];
        $cookieCart = json_decode($_COOKIE["cookieCart"]);
        foreach ($cookieCart as $cook) {
            array_push ($dishesList , $cook->id);
        }
        
        
     }
}

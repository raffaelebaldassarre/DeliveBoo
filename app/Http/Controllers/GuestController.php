<?php

namespace App\Http\Controllers;
use App\Category;
use App\Restaurant;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('guests.welcome', compact('categories', 'restaurants'));
    }

    public function restaurant(Request $request)
    {
        $restaurant = Restaurant::where('slug', $request->slug)->first();
        $dishes = $restaurant->dishes;
        return view('guests.restaurant', compact('dishes', 'restaurant'));
    }

    public function support()
    {
        return view('guests.support');
    }
}

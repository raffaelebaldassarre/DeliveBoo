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

    public function restaurant()
    {
        return view('guests.restaurant');
    }
}

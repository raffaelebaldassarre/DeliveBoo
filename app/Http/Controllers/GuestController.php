<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        return view('guests.welcome', compact('categories'));
    }
}

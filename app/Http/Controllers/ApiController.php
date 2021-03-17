<?php

namespace App\Http\Controllers;
use App\Category;
use App\Restaurant;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function allCategories()
    {
        $cat = Category::all();
        return response()-> json($cat);
    }

    public function filterRestaurants($firstCat, $secondCat = '', $thirdCat = '') 
    {
       $restaurants = Restaurant::all();
       $filterRest = []; 
       foreach ($restaurants as $restaurant) {
           if ($restaurant->categories->contains($firstCat)
           &&($secondCat === '' ? true : $restaurant->categories->contains($secondCat))
           &&($thirdCat === '' ? true : $restaurant->categories->contains($thirdCat)))
           $filterRest = $restaurant;
       }
       return response()-> json($filterRest);
    }
}

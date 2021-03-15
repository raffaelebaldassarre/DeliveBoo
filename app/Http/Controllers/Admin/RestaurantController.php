<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $restaurants = $user->restaurants;
        /* dd($restaurants); */
        
        return view("admin.restaurants.index", compact("restaurants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.restaurants.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $user = auth()->user()->id;

        $request['slug'] = Str::slug($request->name);

        
        //dd($user);

        /* dd($request['slug']); */

        $validateData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'nullable | image',
            'address' => 'required',
            'phone_number' => 'required',
            'categories' => 'required|exists:categories,id',
            'user_id' => 'exists:users,id'
        ]);

        $image = Storage::put('restaurant_images', $request->image);
        $validateData['image'] = $image;

        //dd($validateData);
        
        Restaurant::create($validateData);

        $new_restaurant = Restaurant::orderBy("id", "desc")->first();

        dd($new_restaurant);
       
        $new_restaurant->categories()->attach($request->categories);
        $new_restaurant->user()->attach($user);
        
        //dd($new_restaurant);

        return redirect()->route("admin.restaurants.index", $new_restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}

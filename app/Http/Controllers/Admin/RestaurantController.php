<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $restaurants = $user->restaurants;

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
    
        $user = Auth::id();
        $request['slug'] = Str::slug($request->name);
        $request['user_id'] = $user;

        if(!$request->hasFile('image')){
        $validateData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'nullable | image',
            'address' => 'required',
            'phone_number' => 'required',
            'categories' => 'required|exists:categories,id',
            'user_id' => 'exists:users,id'
        ]); 
        }
        else{
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
        }
        
        Restaurant::create($validateData);

        $new_restaurant = Restaurant::orderBy("id", "desc")->first();

        $new_restaurant->categories()->attach($request->categories);
        
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
        $user = Auth::id();
        if ($user !== $restaurant->user_id) {
            return redirect("/");
        } else {
            return view("admin.restaurants.show", compact("restaurant"));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $user = Auth::id();
        if ($user !== $restaurant->user_id) {
            return redirect("/");
        } else {
            $categories = Category::all();
            return view("admin.restaurants.edit", compact("categories", "restaurant"));
        }
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
        $request['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            Storage::delete($restaurant->image);
            $data = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'image' => 'nullable | image',
                'address' => 'required',
                'phone_number' => 'required',
                'categories' => 'required|exists:categories,id',
                'user_id' => 'exists:users,id'
            ]);
            $image = Storage::put('restaurant_images', $request->image);
            $data['image'] = $image;
            $restaurant->update($data);
            $restaurant->categories()->sync($request->categories);
        }else{
            $data = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'image' => 'nullable | image',
                'address' => 'required',
                'phone_number' => 'required',
                'categories' => 'required|exists:categories,id',
                'user_id' => 'exists:users,id'
            ]);
            $restaurant->update($data);
            $restaurant->categories()->sync($request->categories);
        }
        return redirect()->route('admin.restaurants.show', $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        Storage::delete($restaurant->image);
        return redirect()->route('admin.restaurants.index')->with('success', 'Ristorante Cancellato!');
    }
}

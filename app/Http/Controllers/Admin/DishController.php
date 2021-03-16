<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurant = Restaurant::where('slug', $request->slug)->first();

        $dishes = $restaurant->dishes;

        $user = Auth::id();
        if ($user !== $restaurant->user_id) {
            return redirect("/");
        } else {
            return view("admin.dishes.index", compact("dishes", "restaurant"));
        }
        /* dd($restaurant->dishes); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /* dd($request); */
        $restaurant = Restaurant::where('slug', $request->slug)->first();
        
        return view("admin.dishes.create", compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request); */
        /* $restaurant = Restaurant::where('slug', $request->slug)->first(); */
        $restaurant = Restaurant::where('id', $request->id)->first();
        $id = $restaurant->id;
        /* dd($id); */

        if(!$request->hasFile('cover')){
            $validateData = $request->validate([
                'name' => 'required',
                'ingredients' => 'required',
                'cover' => 'nullable | image',
                'price' => 'required | numeric',
                'available' => 'required | boolean',
                'allergens' => 'required',
                'restaurant_id' => 'exists:restaurants,id'
            ]); 
            $validateData['restaurant_id'] = $id;
        }
            else{
            $validateData = $request->validate([
                'name' => 'required',
                'ingredients' => 'required',
                'cover' => 'nullable | image',
                'price' => 'required | numeric',
                'available' => 'required | boolean',
                'allergens' => 'required',
                'restaurant_id' => 'exists:restaurants,id'
            ]);
    
            $cover = Storage::put('dishes_cover', $request->cover);
            $validateData['cover'] = $cover;
            $validateData['restaurant_id'] = $id;
        }
            
        /* dd($validateData); */
        Dish::create($validateData);

        /* $new_dish = Dish::orderBy("name", "desc")->first(); */

        return redirect()->route('admin.dishes.index', ['slug' => $restaurant->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
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
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}

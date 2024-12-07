<?php

namespace App\Http\Controllers;
use App\Restaurant;
use App\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $restaurant = Restaurant::where('slug', $request->slug)->first();
        $braintreeToken = env('BRAINTREE_TOKEN');
        return view('Cart.index', compact('restaurant','braintreeToken'));
    }

    public function store(Request $request, Faker $faker){
        $dishesList = [];
        $quantityList = [];
        $cookieCart = json_decode($_COOKIE["cookieCart"]);
        $restaurant_id = $cookieCart[0]->restaurant_id;
        $request["restaurant_id"] = $restaurant_id;
        $request["exp_date"] = $faker->dateTimeInInterval($startDate = 'now', $endDate = '+ 1 hour');
        foreach ($cookieCart as $cook) {
            array_push ($dishesList , $cook->id);
            array_push ($quantityList , $cook->quantity);
        }

        
        $validateData = $request->validate([
            'special_requests' => 'nullable',
            'name' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'restaurant_id' => 'required|exists:restaurants,id',
            'dishes' => 'exists:dishes,id',
            'exp_date' => '',
            'quantity' => '',
        ]);
        
        Order::create($validateData);

        $new_order = Order::orderBy("id", "desc")->first();

        foreach ($cookieCart as $cook) {
            $new_order->dishes()->attach([$cook->id => ['quantity' => $cook->quantity]]);  
        }


        $to = $new_order->email;
        Mail::to($to)->send(new Email);

        return redirect()->route('guests.success', compact('new_order'));
    }

    public function success(Order $order)
    {
        $order = Order::orderBy("id", "desc")->first();
        return view('Guests.success', compact('order'));
    }
}

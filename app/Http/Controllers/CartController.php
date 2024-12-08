<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use Braintree\Gateway;
use App\Dish;

class CartController extends Controller
{
    protected $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function index(Request $request)
    {
        $clientToken = $this->gateway->clientToken()->generate();
        //$clientToken = env('BRAINTREE_TOKEN');
        $restaurant = Restaurant::where('slug', $request->slug)->first();
        return view('Cart.index', compact('restaurant', 'clientToken'));
    }

    public function store(Request $request, Faker $faker)
    {
        $dishesList = [];
        $quantityList = [];
        $cookieCart = json_decode($_COOKIE["cookieCart"]);
        $restaurant_id = $cookieCart[0]->restaurant_id;
        $request["restaurant_id"] = $restaurant_id;
        $request["exp_date"] = $faker->dateTimeInInterval($startDate = 'now', $endDate = '+ 1 hour');
        $totalPrice = 0;
        foreach ($cookieCart as $cook) {
            $dish = Dish::find($cook->id); // Recupera il piatto
            $totalPrice += $dish->price * $cook->quantity; // Calcola il prezzo totale
            array_push($dishesList, $cook->id);
            array_push($quantityList, $cook->quantity);
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
        Mail::to($to)->send(new Email($new_order, $totalPrice));

        return redirect()->route('guests.success');
    }

    public function success()
    {
        return view('Guests.success');
    }
}

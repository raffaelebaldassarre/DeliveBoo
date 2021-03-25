<?php

namespace App\Http\Controllers;
use Braintree;
use App\Dish;
use Braintree\Transaction;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    
    public function process(Request $request)
    {
        $totalOrder = 0;
        $cookieCart = json_decode($_COOKIE["cookieCart"]);
        foreach ($cookieCart as $cookie) {
            $dishid = $cookie->id;
            $dish = Dish::where('id', $dishid)->first();
            $totalOrder += $dish->price * $cookie->quantity;
        }

        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $status = Braintree\Transaction::sale([
        'amount' => $totalOrder,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => True
        ]
        ]);

        return response()->json($status);
    }

}

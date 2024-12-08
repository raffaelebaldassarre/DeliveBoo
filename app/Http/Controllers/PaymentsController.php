<?php

namespace App\Http\Controllers;
use App\Dish;
use Braintree\Transaction;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    
    public function process(Request $request)
    {
        $totalOrder = 0;
        $cookieCart = json_decode($_COOKIE["cookieCart"]);
        foreach ($cookieCart as $cookie) {
            $dishId = $cookie->id;
            $dish = Dish::find($dishId);
            if ($dish) {
                $totalOrder += $dish->price * $cookie->quantity;
            } else {
                throw new \Exception("Il piatto con ID $dishId non esiste.");
            }
        }

        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $status = Transaction::sale([
        'amount' => $totalOrder,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => True
        ]
        ]);

        return response()->json($status);
    }

}

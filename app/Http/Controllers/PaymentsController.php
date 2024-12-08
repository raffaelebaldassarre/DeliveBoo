<?php

namespace App\Http\Controllers;

use App\Dish;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    protected $gateway;

    // Inietta il Gateway nel costruttore
    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

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

        $status = $this->gateway->transaction()->sale([
            'amount' => $totalOrder,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return response()->json($status);
    }
}

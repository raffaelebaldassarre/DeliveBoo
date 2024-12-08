<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $totalPrice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $totalPrice)
    {
        $this->order = $order;
        $this->totalPrice = $totalPrice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $expDate = Carbon::parse($this->order->exp_date)->format('H:i');
        return $this->from(env('MAIL_FROM_ADDRESS'))->markdown('mail.orderConfirmed')->with([
            'expDate' => $expDate,
            'order' => $this->order,
            'totalPrice' => $this->totalPrice,
        ]);
    }
}

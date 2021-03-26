<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = Order::orderBy("id", "desc")->first();
       /*  dd($order); */
       /* dd($order->restaurant->slug); */
        return $this->from('noreply@' . $order->restaurant->slug . '.deliveboo.magally')->markdown('mail.orderConfirmed', compact('order'));
    }
}

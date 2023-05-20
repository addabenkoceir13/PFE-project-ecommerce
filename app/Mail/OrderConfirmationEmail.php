<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $order)
    {
        $this->data = $data;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contant@techshop.dz')
                    ->subject($this->data["subject"])
                    ->with('data', $this->data, 'order', $this->order)
                    ->view('emails.email-user-order');


    }
}

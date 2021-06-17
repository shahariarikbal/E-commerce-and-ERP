<?php

namespace App\Mail;

use App\Model\OrderDetails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $orderDetails;
    public $pdf;

    public function __construct($orderDetails, $pdf)
    {
        $this->orderDetails = $orderDetails;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        dd($this->orderDetails);
        return $this->view('version-1.fontend.email.order')->with('orderDetails', $this->orderDetails);
    }
}

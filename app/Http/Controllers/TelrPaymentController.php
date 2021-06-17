<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelrPaymentController extends Controller
{
    public function success()
    {
        dd('success');
    }

    public function cancel()
    {
        dd('cancel');
    }

    public function declined()
    {
        dd('declined');
    }
}

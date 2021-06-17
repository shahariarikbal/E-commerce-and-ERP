<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\OrderDetails;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Session;


class PayPalPaymentController extends Controller
{
    public function handlePayment()
    {

        $checkoutData = $this->checkoutData();

        $provider = new ExpressCheckout();
        //dd($provider);
        $response = $provider->setExpressCheckout($checkoutData);
        //dd($response);
        // This will redirect user to PayPal
        return redirect($response['paypal_link']);


//        $data = [];
//        $data['items'] = \Cart::content()->toArray();
//
//        //dd($data['items']);
//
//        $data['invoice_id'] = 1;
//        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
//        $data['return_url'] = url('/payment-success');
//        $data['cancel_url'] = url('/cart');
//
//        $total = 0;
//        foreach($data['items'] as $item) {
//            $total += $item['price'] * $item['qty'];
//        }

        //dd($total);

        //$data['total'] = $total;


        //dd($total);

    }

    private function checkoutData()
    {
        $customerId = Session::get('id');

        $cart = \Cart::content($customerId)->toarray();

        $priceTotal = \Cart::priceTotal();

        //dd($priceTotal);

        $cartItem = array_map(function ($item){
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['qty'],
            ];
        },$cart);

        //dd($cartItem);

        $checkoutData = [
            'items' => $cartItem,
            'return_url' => url('/payment-success'),
            'cancel_url' => url('/cart'),
            'invoice_id' => uniqid(),
            'invoice_description' => "Order description",
            'total' => $priceTotal
        ];

        return $checkoutData;
        //dd($checkoutData);

    }

    public function paymentCancel()
    {
        Toastr::error('Paypal Payment Cancel', 'Error');
        return redirect('/checkout');
    }

    public function paymentSuccess(Request $request)
    {
        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $provider = new ExpressCheckout();
        $response = $provider->getExpressCheckoutDetails($token);
        $checkoutData = $this->checkoutData();

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])){
            $paypal_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);
            $status = $paypal_status['PAYMENTINFO_0_PAYMENTSTATUS'];
        }

        \Cart::destroy();

        //dd('payment success');
        Toastr::success('Paypal payment has been successfully done', 'Success');
        return redirect('/complete/order');
    }
}

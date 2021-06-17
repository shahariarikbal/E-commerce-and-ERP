<?php

namespace App\Http\Controllers;

use App\Mail\CustomerCheckoutMail;
use App\Mail\CustomerOrderMail;
use App\Model\Cart;
use App\Model\Checkout;
use App\Model\Customer;
use App\Model\Country;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Payment;
use App\Model\SaleProduct;
use App\Model\Shipping;
use App\Model\WebBrand;
use App\Model\WebCategory;
use App\Model\WebManufacture;
use App\Model\WebProduct;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Gloudemans\Tests\Shoppingcart\Fixtures\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;
use DB;
class CheckoutController extends Controller
{
    public function checkout()
    {
        $webCategories = WebCategory::all();
        $webProducts = WebProduct::all();
        $webFeatureProducts = WebProduct::where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webSoftwareProducts = WebProduct::where('product_type', 'Software')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = WebProduct::where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = WebProduct::where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = WebProduct::where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = WebProduct::where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $countries = Country::all();
        return view('version-1.fontend.checkout.checkout', compact('countries','webSoftwareProducts','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }

    public function checkoutStore(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'name'           => 'required',
            'mobile_no_one'  => 'nullable|unique:customers',
            'office_contact' => 'nullable|unique:customers',
            'email_two'      => 'nullable|unique:customers',
            'email_one'      => 'nullable|unique:customers',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $lastInvoiceID = $customer->orderBy('id', 'desc')->pluck('id')->first();
        $customer->invoice_no = '000'.($lastInvoiceID + 1);
        $customer->receipt_no = 'Diplomacy - '.($lastInvoiceID + 1);
        $customer->mobile_no_one = $request->phone;
        $customer->email_one = $request->email;
        $customer->address_one = $request->street_address;
        $customer->city_one = $request->city;
        $customer->country_one = $request->country;
        $customer->address_two = $request->street_address;
        $customer->zip = $request->zip;
        $customer->state = $request->state;
        $customer->status = 'online';
        $customer->password = bcrypt($request->password);
        $customer->apartment = $request->apartment;
        $customer->net_total = Session::get('totalAmount');
        $customer->paid_amount = Session::get('totalAmount');
        $customer->due_amount = 0;
        //$customer->credit_amount = $request->credit_amount;
        //$customer->balance = $request->balance;
        $customer->save();

        Session::put('id', $customer->id);
        Session::put('name', $customer->name);
        Session::put('email', $customer->email_one);

//        if (!empty($customer)) {
//            foreach ($request->name as $key => $item) {
//                $saleProduct = new SaleProduct();
//                $saleProduct->customer_id = $customer->id;
//                $saleProduct->product_id = Session::get('productId');
//                $saleProduct->sku = Session::get('sku')[$key];
//                $saleProduct->available_qty = Session::get('qty')[$key];
//                $saleProduct->rate = Session::get('price')[$key];
//                $saleProduct->total = Session::get('price')[$key];
//                $saleProduct->save();
//            }
//        }

//        if ($checkout->save()) {
//            Mail::to($request->email)->send(new CustomerCheckoutMail($checkout));
//        }
        Toastr::success('Registration successfully done', 'success');
        return redirect('/show-cart-products');
    }

//    public function emailVerification($token = null)
//    {
//        if ($token === null) {
//            return redirect('/checkout')->with('error', 'Invalid token');
//        }
//
//        $customer = Checkout::where('email_verification_token', $token)->first();
//
//        if ($customer === null){
//            return redirect('/checkout')->with('error', 'Invalid token');
//        }
//
//        $customer->update([
//            'email_verified' => 1,
//            'email_verified_at' => Carbon::now(),
//            'email_verification_token' => ''
//        ]);
//
//        return redirect('/checkout')->with('success', 'Your account is activated. You can login now');
//    }

    public function customerLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $customer = Customer::where('email_one', $request->email)->first();
//        if ($customer->email_verified === 0){
//            return redirect('/checkout')->with('error', 'Your account not activated, Please verify your account.');
//        }

        if ($customer){
            if (password_verify($request->password, $customer->password)){
                Session::put('id', $customer->id);
                Session::put('name', $customer->name);
                Session::put('email', $customer->email_one);
                return redirect('/show-cart-products');
            }else{
                return redirect('/checkout')->with('error', 'Password mismatched');
            }

        }else{
            return redirect('/checkout')->with('error', 'E-mail mismatched');
        }

    }

    public function shipping()
    {
        $sessionId = Session::get('id');
        if(!$sessionId){
            return redirect('/checkout');
        }

        $customer = Customer::find(Session::get('id'));
        $webCategories = WebCategory::all();
        $webProducts = WebProduct::all();
        $webFeatureProducts = WebProduct::where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webSoftwareProducts = WebProduct::where('product_type', 'Software')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = WebProduct::where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = WebProduct::where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = WebProduct::where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = WebProduct::where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $cartProductsAmount = \Cart::content();
        $totalAmount = 0;
        foreach ($cartProductsAmount as $price) {
            $totalAmount = ($totalAmount + $price->price);
        }
        //dd($totalAmount);

        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $countries = Country::all();
        return view('version-1.fontend.checkout.shipping', compact('countries','totalAmount','customer', 'webSoftwareProducts','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }

    public function shippingStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max:15',
        ]);

        $shipping = new Shipping();
        $shipping->customer_id = Session::get('id');
        $shipping->name = $request->first_name. '' .$request->last_name;
        $shipping->address = $request->address;
        $shipping->city = $request->city;
        $shipping->country = $request->country;
        $shipping->shipping_mood = $request->shipping_mood;
        $shipping->shipping_value = $request->shipping_value;
        $shipping->shipping_total = $request->shipping_total;
        $shipping->state = $request->state;
        $shipping->zip = $request->zip;
        $shipping->email = $request->email;
        $shipping->phone = $request->phone;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
         if (!empty($shipping)) {
             return redirect('/payment/methods');
         }
         return redirect()->back()->with('error', 'Some think is wrong, Please Try again');
    }

    public function paymentMethod()
    {
        $shippingCustomer = Customer::find(Session::get('id'));
        $webCategories = WebCategory::all();
        $webProducts = WebProduct::all();
        $webFeatureProducts = WebProduct::where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webSoftwareProducts = WebProduct::where('product_type', 'Software')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = WebProduct::where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = WebProduct::where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = WebProduct::where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = WebProduct::where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $countries = Country::all();
        return view('version-1.fontend.checkout.payment', compact('countries','shippingCustomer','webSoftwareProducts','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }

    public function paymentMethodStore(Request $request)
    {
        $paymentMethod = $request->payment_type;
        $customer = OrderDetails::with('customer')->where('customer_id', Session::get('id'))->first();
        if ($paymentMethod === 'Cash') {

            $order = new Order();
            $order->customer_id = Session::get('id');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('totalAmount');
            $order->save();

            $paymentType = new Payment();
            $paymentType->customer_id = Session::get('id');
            $paymentType->shipping_id = Session::get('shippingId');
            $paymentType->order_id = $order->id;
            $paymentType->payment_type = $request->payment_type;
            $paymentType->bank_name = $request->bank_name;
            $paymentType->acc_no = $request->acc_no;
            $paymentType->address = $request->address;
            $paymentType->swift_code = $request->swift_code;
            $paymentType->amount = $request->amount;
            $paymentType->save();

            $cartProducts = \Cart::content();

            foreach ($cartProducts as $product) {
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->customer_id = Session::get('id');
                $orderDetails->shipping_id = Session::get('shippingId');
                $orderDetails->product_id = $product->id;
                $orderDetails->product_name = $product->name;
                $orderDetails->product_price = $product->price;
                $orderDetails->product_qty = $product->qty;
                $orderDetails->save();

//                if ($orderDetails->save()) {
//                    Mail::to($request->email)->send(new CustomerOrderMail($orderDetails, $pdf));
//                }

            }

            $pdf = \PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('version-1.fontend.email.order', compact('order', 'customer'));

            $email = $request->email;


            Mail::send('version-1.fontend.email.order',compact('order', 'customer'),
                function ($msg) use ($email, $pdf){
                    $msg->from('admin@dkcc.com', 'Diplomacy');
                    $msg->subject('Subject: Order Confirmation Email');
                    $msg->attachData($pdf->output(), "Invoice.pdf");
                    $msg->to($email);
                });

            \Cart::destroy();


            $request->session()->flush();
            return redirect('/complete/order');

        }elseif ($paymentMethod === 'Paypal') {
            return redirect()->route('make.payment');
        }else {
            $telrManager = new \TelrGateway\TelrManager();

            $billingParams = [
                'first_name' => 'Moustafa Gouda',
                'sur_name' => 'Bafi',
                'address_1' => 'Gnaklis',
                'address_2' => 'Gnaklis 2',
                'city' => 'Alexandria',
                'region' => 'San Stefano',
                'zip' => '11231',
                'country' => 'EG',
                'email' => 'example@company.com',
            ];

            return $telrManager->pay('12381', '1', 'DESCRIPTION ...', $billingParams)->redirect();

//            $params = array(
//                'ivp_method'  => 'create',
//                'ivp_store'   => '21765',
//                'ivp_authkey' => '11ca2b0bMT44d5bfdmbq6jHJ',
//                'ivp_cart'    => '12381',
//                'ivp_test'    => '1',
//                'ivp_amount'  => '100.00',
//                'ivp_currency'=> 'AED',
//                'ivp_desc'    => 'Product Description',
//                'return_auth' => 'https://domain.com/return.html',
//                'return_can'  => 'https://domain.com/return.html',
//                'return_decl' => 'https://domain.com/return.html'
//            );
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
//            curl_setopt($ch, CURLOPT_POST, count($params));
//            curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
//            $results = curl_exec($ch);
//            curl_close($ch);
//
//            return $results;
//
//            $results = json_decode($results,true);

        }
    }

    public function completeOrder()
    {
        $webCategories = WebCategory::all();
        $webProducts = WebProduct::all();
        $webFeatureProducts = WebProduct::where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webSoftwareProducts = WebProduct::where('product_type', 'Software')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = WebProduct::where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = WebProduct::where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = WebProduct::where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = WebProduct::where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $countries = Country::all();
        $order = Order::get();
        $lastInvoiceID = $order->sortByDesc('id')->pluck('id')->first();
        $order = ($lastInvoiceID + 1);
        return view('version-1.fontend.checkout.complete', compact('order','countries','webSoftwareProducts','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }
}

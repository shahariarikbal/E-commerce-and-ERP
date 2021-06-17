<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Product;
use App\Model\Supplier;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function showAdminDashboard()
    {
        $customers = Customer::get()->count();
        $suppliers = Supplier::get()->count();

        $products = Product::get()->count();
        $customerOrders = Order::with('orderDetails', 'payment', 'customer')->orderBy('created_at', 'DESC')->get();
        return view('backend.admin.home.index', compact('customers', 'suppliers', 'products', 'customerOrders'));

    }

    public function orderView($id)
    {
        $orders = Order::with('orderDetails', 'payment', 'customer')->where('id', $id)->first();

        $pdf = \PDF::loadView('backend.admin.invoice.invoice', compact('orders'));

        return $pdf->stream('Invoice.pdf');
    }
}

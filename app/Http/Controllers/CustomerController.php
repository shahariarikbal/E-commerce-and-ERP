<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\DailyPaid;

use App\Model\Order;
use App\Model\Sale;

use App\Model\OrderDetails;
use App\Model\SaleProduct;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
//        $debit = \DB::table('customers')->sum('debit_amount');
//        $creditSum = \DB::table('customers')->sum('credit_amount');
//        $totalSum = \DB::table('customers')->sum('balance');
        return view('backend.admin.customer.manage', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.customer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $customer->mobile_no_one = $request->mobile_no_one;
        $customer->email_one = $request->email_one;
        $customer->address_one = $request->address_one;
        $customer->city_one = $request->city_one;
        $customer->country_one = $request->country_one;
        //$customer->debit_amount = $request->debit_amount;
        $customer->fax_no = $request->fax_no;
        $customer->office_contact = $request->office_contact;
        $customer->email_two = $request->email_two;
        $customer->address_two = $request->address_two;
        $customer->city_two = $request->city_two;
        $customer->customer_web = $request->customer_web;
        $customer->customer_ship_acc = $request->customer_ship_acc;
        $customer->country_two = $request->country_two;

        //$customer->credit_amount = $request->credit_amount;
        //$customer->balance = $request->balance;
        $customer->save();
        Toastr::success('Add new Customer', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('backend.admin.customer.view', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('backend.admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'           => 'required',
            'mobile_no_one'  => 'nullable|unique:customers,mobile_no_one,'.$id,
            'office_contact' => 'nullable|unique:customers,office_contact,'.$id,
            'email_two'      => 'nullable|email|unique:customers,email_two,'.$id,
            'email_one'      => 'nullable|email|unique:customers,email_one,'.$id,
        ]);

        $customer = Customer::find($id);

        $customer->name = $request->name;
        $customer->mobile_no_one = $request->mobile_no_one;
        $customer->email_one = $request->email_one;
        $customer->address_one = $request->address_one;
        $customer->city_one = $request->city_one;
        $customer->country_one = $request->country_one;
        //$customer->debit_amount = $request->debit_amount;
        $customer->fax_no = $request->fax_no;
        $customer->office_contact = $request->office_contact;
        $customer->email_two = $request->email_two;
        $customer->address_two = $request->address_two;
        $customer->city_two = $request->city_two;
        $customer->customer_web = $request->customer_web;
        $customer->customer_ship_acc = $request->customer_ship_acc;
        $customer->country_two = $request->country_two;
        //$customer->credit_amount = $request->credit_amount;
        //$customer->balance = $request->balance;
        $customer->save();
        Toastr::success('Update Customer', 'success');
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        Toastr::success('Customer has been Temporary Deleted', 'success');
        return redirect()->back();
    }

    public function trashList()
    {
        $trashCustomer = Customer::onlyTrashed()->get();
        return view('backend.admin.customer.trash-list', compact('trashCustomer'));
    }

    public function restore($customer)
    {
        $restore = Customer::onlyTrashed()->where('id', $customer);
        $restore->restore();
        Toastr::success('Customer has been Restored', 'success');
        return redirect()->back();
    }

    public function permantlyDelete($customer)
    {
        Customer::where('id', $customer)->forceDelete();
        Toastr::success('Customer has been Permanently Delete', 'success');
        return redirect()->back();
    }

    public function salePayment($sale_id)
    {
        // dd(Sale::find($sale_id));
        $sale = Sale::find($sale_id);

        if($sale==null){
            return redirect()->back();
        }
        return view('backend.admin.sale.payment', compact('sale'));
    }

    public function salePaymentUpdate(Request $request, $sale_id)
    {
        // return $request->all();

        $sale = Sale::find($sale_id);

        if($sale==null){
            return redirect()->back();
        }

        $sale->paid_amount = $request->paid_amount;
        $sale->due_amount = $request->due_amount;
        $sale->save();

        $dailyPaid = new DailyPaid();
        $dailyPaid->sale_id = $sale->id;
        $dailyPaid->daily_paid = $request->daily_paid;
        $dailyPaid->debit_amount = $request->paid_amount;
        $dailyPaid->credit_amount = $request->due_amount;
        $dailyPaid->save();

        Toastr::success('Sale Payment Updated', 'success');
        return redirect('customer/all/data/' . $sale->customer->id );
    }

    public function customerMoneyReceipts()
    {
        $dailyPaids = DailyPaid::with('sale')->whereNotNull('sale_id')->orderBy('id', 'Asc')->get();
        return view('backend.admin.customer.vouser-list', compact('dailyPaids'));
    }

    public function customerReceipt($id)
    {
        $dailyPaid = DailyPaid::with('sale')->find($id);
        return view('backend.admin.customer.vouser', compact('dailyPaid'));
    }

    public function customerReceiptDownload($id)
    {
        $dailyPaid = DailyPaid::with('sale')->find($id);
        // return view('backend.admin.customer.receipt', compact('dailyPaid'));
        $pdf = \PDF::loadView('backend.admin.customer.receipt', compact('dailyPaid'))->setOptions(['isRemoteEnabled' => true, 'defaultFont' => 'Poppins' ]);

        return $pdf->stream('Receipt.pdf');
    }

    public function customerInvoice($id)
    {
        $customer = Customer::where('id', $id)->first();
        $pdf = \PDF::loadView('backend.admin.customer.invoice', compact('customer'));
        return $pdf->stream('invoice.pdf');
    }

    public function onlineCustomerInvoice($id)
    {
        $onlineCustomer = OrderDetails::with('order', 'product', 'customer')->where('customer_id', $id)->first();
        $pdf = \PDF::loadView('backend.admin.customer.online-invoice', compact( 'onlineCustomer'));
        return $pdf->stream('invoice.pdf');
    }

    public function customerOrderInvoice($customer_id)
    {
        $orderInvoice = OrderDetails::with('order', 'product', 'customer')->where('customer_id', $customer_id)->get();
        $customer = OrderDetails::with('customer')->where('customer_id', $customer_id)->first();
        $pdf = \PDF::loadView('backend.admin.invoice.order', compact( 'orderInvoice', 'customer'));
        return $pdf->stream('invoice.pdf');
    }


    public function customerOrders()
    {
       $orders = Order::with('customer','shipping')->orderByDesc('id')->get();
        return view('backend.admin.customer.orders', compact('orders'));
    }

}

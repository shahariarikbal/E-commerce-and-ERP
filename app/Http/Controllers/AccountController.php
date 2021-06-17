<?php

namespace App\Http\Controllers;

use App\Model\Cash;
use App\Model\Customer;
use App\Model\Purchase;
use App\Model\Sale;
use App\Model\SaleProduct;
use App\Model\Supplier;
use App\Model\Head;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function cashBook()
    {
        $cash = \DB::table('cashes')
                            ->get()
            ->groupBy('sale_date');
        return view('backend.admin.account.index', compact('cash'));
    }

    public function chartAccount()
    {
        $customers = Customer::get();
        $suppliers = Supplier::get();
        $totalSales = Sale::get();
        $totalPurchases = Purchase::get();
        // dd($totalPurchases);
        $totalPurchase = 0;
        foreach ($totalPurchases as $data) {
            $totalPurchase = ($totalPurchase + ($data->net_total));

        }
        //dd();

        $totalSale = 0;
        foreach ($totalSales as $data) {
            $totalSale = ($totalSale + ($data->net_total));

        }
        $assets = $totalSale - $totalPurchase;
        return view('backend.admin.account.chart', compact('customers', 'suppliers', 'assets'));
    }

    public function customersData($id)
    {
        // $customersData = Customer::where('id', $id)->get();
        $customerSaleData = Sale::where('customer_id', $id)->get();
        return view('backend.admin.account.customer-list', compact('customerSaleData'));
    }

    public function suppliersData($id)
    {
        $suppliersData = Supplier::where('id', $id)->get();
        return view('backend.admin.account.supplier-list', compact('suppliersData'));
    }

    public function suppliersInvoice($id)
    {
        return $supplierInvoice = Purchase::with('supplier')->where('supplier_id', $id)->first();
    }

    public function headStore(Request $r){
        // return $r->all();

        $head = new Head;
        
        $head->name = $r->name;

        if( $r->head_id != -1){
            $head->head_id = $r->head_id;
        }

        $head->save();


        session()->flash('my_success', 'Head added successfully');
        return redirect()->back();

        

    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\PurchaseExport;
use App\Exports\SaleExport;
use App\Model\Cash;
use App\Model\Customer;
use App\Model\Product;
use App\Model\ProductQtyCount;
use App\Model\Purchase;
use App\Model\PurchaseProduct;
use App\Model\Sale;
use App\Model\SaleProduct;
use App\Model\SaleProductCount;
use App\Model\Stock;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;
class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('saleProduct', 'customer')->has('saleProduct')->get();
        return view('backend.admin.sale.manage', compact('sales'));
    }

    public function saleExportExcel()
    {
        return Excel::download(new SaleExport(), 'sale.xlsx');
    }
    public function saleExportCsv()
    {
        return Excel::download(new SaleExport(), 'sale.csv');
    }

    public function saleExportPdf()
    {
        $sales = Sale::all();
        $pdf = \PDF::loadView('backend.admin.sale.receipt', compact('sales'));

        return $pdf->download('Sale.pdf');
    }

    public function create(Request $request)
    {
        $customers = Customer::all();
        $products = Product::where('status', 1)->orderBy('sku','asc')->get();
        return view('backend.admin.sale.add', compact('customers', 'products'));
    }

    public function saleProducts($id)
    {
        $product = Product::where('status', 1)->with('customerPrice', 'saleProductCount')->find($id);
        return response()->json($product);
    }

    public function saleCustomerBalance($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function saleProductStore(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'customer_id' => 'required|integer',
            'payment_type' => 'required|string',
            'type' => 'required',
        ]);

        \DB::transaction(function () use ($request){
            $sale = new Sale();
            $lastInvoiceID = $sale->orderBy('id', 'desc')->pluck('id')->first();
            $sale->customer_id = $request->customer_id;
            $sale->payment_type = $request->payment_type;
            $sale->sale_date = $request->sale_date;
            $sale->invoice_no = '000'.($lastInvoiceID + 1);
            $sale->type = $request->type;
            $sale->acc_no = $request->acc_no;
            $sale->bank_name = $request->bank_name;
            $sale->branch_name = $request->branch_name;
            $sale->acc_name = $request->acc_name;
            $sale->swift_address = $request->swift_address;
            $sale->tax = $request->tax;
            $sale->vat = $request->vat;
            $sale->shipping_cost = $request->shipping_cost;
            $sale->misc_cost = $request->misc_cost;
            $sale->grand_total = $request->grand_total;
            $sale->previous_balance = $request->previous_balance;
            $sale->net_total = $request->net_total;
            $sale->paid_amount = $request->paid_amount;
            $sale->due_amount = $request->due_amount;
            $sale->created_by = Session::get('name');
            $sale->currency = $request->currency;
            $sale->save();

            if (!empty($sale)) {
                Customer::updateOrCreate(
                    [
                        'id' => $request->customer_id
                    ],
                    [
                        'paid_amount' => $request->paid_amount,
                        'due_amount' => $request->due_amount,
                        'net_total' => $request->net_total,
                    ]
                );
            }

            if (!empty($sale)) {
                foreach ($request->product_name as $key => $item) {
                    // dd($request->qty[1]);
                    $saleProduct = new SaleProduct();
                    $saleProduct->sale_id = $sale->id;
                    $saleProduct->customer_id = $request->customer_id;
                    $saleProduct->product_id = $request->product_name[$key];
                    $saleProduct->sku = $request->sku[$key];
                    $saleProduct->condition = ($request->condition) ? $request->condition[$key] : '';
                    $saleProduct->unit_name = $request->unit[$key];
                    $saleProduct->available_qty = $request->qty[$key];
                    $saleProduct->rate = $request->rate[$key];
                    $saleProduct->total = $request->total[$key];
                    $saleProduct->save();

                    if ($saleProduct->save()) {
                        // ProductQtyCount::updateOrCreate(
                        //     [
                        //         'product_id' => $request->product_name[$key]
                        //     ],
                        //     [
                        //         'qty' => $request->total_qty[$key],
                        //     ]
                        // );

                        SaleProduct::updateOrCreate(
                            [
                                'product_id' => $request->product_name[$key]
                            ],
                            [
                                'available_qty' => $request->total_qty[$key],
                            ]
                        );

                        SaleProductCount::updateOrCreate(
                            [
                                'product_id' => $request->product_name[$key]
                            ],
                            [
                                'qty' => $request->total_qty[$key],
                                'sale_id' => $sale->id,
                                'sale_product_id' => $saleProduct->id,
                            ]
                        );

                        Stock::updateOrCreate(
                            [
                                'product_id' => $request->product_name[$key]
                            ],
                            [
                                'out_qty' => $request->total_qty[$key],
                                'sale_id' => $sale->id,
                                'customer_id' => $request->customer_id,
                                'sales_price' => $request->net_total,
                            ]
                        );

                    }
                }
            }
        });

        Toastr::success('Sale has been successfully created', 'Success');
        return redirect()->back();
    }

    public function saleInvoice($id)
    {
        $invoice = SaleProduct::with('sale', 'customer', 'product')->where('sale_id', $id)->first();
        $pdf = \PDF::loadView('backend.admin.sale.invoice', compact('invoice'));
        return $pdf->stream('invoice.pdf');
    }

    public function saleEdit($id)
    {
        $saleEdit = Sale::with('saleProduct', 'customer')->find($id);
        //dd($saleEdit);
        $customers = Customer::all();
        $products = Product::where('status', 1)->get();
        return view('backend.admin.sale.edit', compact('saleEdit', 'customers', 'products'));
    }

    public function saleUpdate(Request $request, Sale $sale)
    {
        return $request;
        $this->validate($request, [
            'customer_id'  => 'required|integer',
            'payment_type' => 'required|string',
            'types'        => 'required',
        ]);

        // dd($request->product_id);

        \DB::transaction(function () use ($request, $sale){
            $sale->customer_id = $request->customer_id;
            $sale->payment_type = $request->payment_type;
            $sale->sale_date = $request->sale_date;
            $lastInvoiceID = $sale->orderBy('id', 'desc')->pluck('id')->first();
            $sale->invoice_no = '000'.($lastInvoiceID + 1);
            $sale->type = $request->types;
            $sale->acc_no = $request->acc_no;
            $sale->bank_name = $request->bank_name;
            $sale->branch_name = $request->branch_name;
            $sale->acc_name = $request->acc_name;
            $sale->swift_address = $request->swift_address;
            $sale->tax = $request->tax;
            $sale->vat = $request->vat;
            $sale->qty = $request->qty;
            $sale->shipping_cost = $request->shipping_cost;
            $sale->misc_cost = $request->misc_cost;
            $sale->grand_total = $request->grand_total;
            $sale->previous_balance = $request->previous_balance;
            $sale->net_total = $request->net_total;
            $sale->paid_amount = $request->paid_amount;
            $sale->due_amount = $request->due_amount;
            $sale->created_by = Session::get('name');
            $sale->save();

            if (!empty($sale)) {
                Customer::updateOrCreate(
                    [
                        'id' => $request->customer_id
                    ],
                    [
                        'paid_amount' => $request->paid_amount,
                        'due_amount' => $request->due_amount,
                        'net_total' => $request->net_total,
                    ]
                );
            }

            //$sale->saleProduct()->delete();
            if ( !empty($sale) && $request->product_id != null ) {
                SaleProduct::where('sale_id', $sale->id)->delete();
                foreach ($request->product_id as $key => $item) {
                    $saleProduct = new SaleProduct();
                    $saleProduct->sale_id = $sale->id;
                    $saleProduct->customer_id = $request->customer_id;
                    $saleProduct->product_id = $request->product_id[$key];
                    $saleProduct->sku = $request->sku[$key];
                    $saleProduct->condition = $request->condition[$key];
                    $saleProduct->unit_name = $request->unit[$key];
                    $saleProduct->available_qty = $request->total_qty[$key];
                    $saleProduct->rate = $request->rate[$key];
                    $saleProduct->total = $request->total[$key];
                    $saleProduct->save();


                    if ($saleProduct->save()) {
                        SaleProduct::updateOrCreate(
                            [
                                'product_id' => $request->product_id[$key]
                            ],
                            [
                                'available_qty' => $request->total_qty[$key],
                            ]
                        );
                    }
                    if ($saleProduct->save()) {
                        SaleProductCount::updateOrCreate(
                            [
                                'product_id' => $request->product_id[$key]
                            ],
                            [
                                'qty' => $request->total_qty[$key],
                                'sale_id' => $sale->id,
                                'sale_product_id' => $saleProduct->id,
                            ]
                        );

                        Stock::updateOrCreate(
                            [
                                'product_id' => $request->product_id[$key]
                            ],
                            [
                                'out_qty' => $request->total_qty[$key],
                                'sale_id' => $sale->id,
                                'customer_id' => $request->customer_id,
                                'sales_price' => $request->net_total,
                            ]
                        );

//                        ProductQtyCount::updateOrCreate(
//                            [
//                                'product_id' => $request->product_name[$key]
//                            ],
//                            [
//                                'qty' => $request->total_qty[$key],
//                            ]
//                        );
                    }
                }
            }
        });

        Toastr::success('ProductTrait Purchase has been successfully updated', 'Success');
        return redirect()->back();
    }

    public function saleProductDelete($id)
    {
        $saleProductDelete = Sale::find($id);
        $saleProductDelete->delete();
        Toastr::success('ProductTrait Purchase has been successfully deleted', 'Success');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\PurchaseExport;
use App\Model\Cash;
use App\Model\Product;
use App\Model\ProductQtyCount;
use App\Model\Purchase;
use App\Model\PurchaseProduct;
use App\Model\Stock;
use App\Model\Supplier;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;
class PurchaseController extends Controller
{
    public function index()
    {
        $purchase = Purchase::with('purchaseProduct', 'supplier', 'purchaseProductCount')->get();
        return view('backend.admin.purchase.manage', compact('purchase'));
    }

    public function purchaseExportExcel()
    {
        return Excel::download(new PurchaseExport(), 'purchase.xlsx');
    }
    public function purchaseExportCsv()
    {
        return Excel::download(new PurchaseExport(), 'purchase.csv');
    }

    public function purchaseExportPdf()
    {
        $purchases = Purchase::all();
        $pdf = \PDF::loadView('backend.admin.purchase.receipt', compact('purchases'));

        return $pdf->download('Purchase.pdf');
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::where('status', 1)->get();
        return view('backend.admin.purchase.add', compact('suppliers', 'products'));
    }

    public function purchaseProducts($id)
    {
        $product = Product::where('status', 1)->with('supplierPrice', 'purchaseProduct', 'purchaseProductCount')->find($id);
        return response()->json($product);
    }

    public function purchaseSupplierBalance($id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    public function purchaseProductStore(Request $request)
    {
        //return $request->all();
        // $this->validate($request, [
        //     'supplier_id' => 'required|integer',
        //     'payment_type' => 'required|string',
        //     'types' => 'required',
        // ]);

        \DB::transaction(function () use ($request){

            $lastInvoiceID = Purchase::orderBy('id', 'desc')->pluck('id')->first();

            $purchase = new Purchase();
            $purchase->supplier_id = $request->supplier_id;
            $purchase->payment_type = $request->payment_type;
            $purchase->purchase_date = $request->purchase_date;
            $purchase->invoice_no = '000'.($lastInvoiceID + 1);
            $purchase->types = $request->types;
            $purchase->tax = $request->tax;
            $purchase->vat = $request->vat;
            // $purchase->qty = $request->qty;
            $purchase->shipping_cost = $request->shipping_cost;
            $purchase->misc_cost = $request->misc_cost;
            $purchase->grand_total = $request->grand_total;
            $purchase->previous_balance = $request->previous_balance;
            $purchase->net_total = $request->net_total;
            $purchase->paid_amount = $request->paid_amount;
            $purchase->due_amount = $request->due_amount;
            $purchase->created_by = Session::get('name');
            $purchase->save();

            if (!empty($purchase)) {
                Supplier::updateOrCreate(
                    [
                        'id' => $request->supplier_id
                    ],
                    [
                        'daily_paid' => $request->paid_amount,
                        'previous_due' => $request->due_amount,
                        'balance' => $request->net_total,
                    ]
                );
            }

            if (!empty($purchase)) {
                foreach ($request->product_name as $key => $item) {
                    $purchaseProduct = new PurchaseProduct();
                    $purchaseProduct->purchase_id = $purchase->id;
                    $purchaseProduct->product_id = $request->product_name[$key];
                    $purchaseProduct->supplier_id = $request->supplier_id;
                    $purchaseProduct->sku = $request->sku[$key];
                    $purchaseProduct->unit_name = $request->unit[$key];
                    $purchaseProduct->available_qty = $request->qty[$key];
                    $purchaseProduct->rate = $request->rate[$key];
                    $purchaseProduct->total = $request->total[$key];
                    $purchaseProduct->save();

                    if ($purchaseProduct->save()) {
                        ProductQtyCount::updateOrCreate(
                            [
                                'product_id' => $request->product_name[$key]
                            ],
                            [
                                'qty' => $request->total_qty[$key],
                                'purchase_id' => $purchase->id,
                                'purchase_product_id' => $purchaseProduct->id,
                            ]
                        );

                        Stock::updateOrCreate(
                            [
                                'product_id' => $request->product_name[$key]
                            ],
                            [
                                'in_qty' => $request->total_qty[$key],
                                'purchase_id' => $purchase->id,
                                'supplier_id' => $request->supplier_id,
                                'purchase_price' => $request->net_total,
                            ]
                        );
                    }
                }
            }
        });

        Toastr::success('ProductTrait Purchase has been successfully created', 'Success');
        return redirect()->back();
    }

    public function purchaseInvoice($id)
    {
        $invoiceProducts = PurchaseProduct::with('products', 'supplier', 'purchase')->where('purchase_id', $id)->get();
        $invoice = PurchaseProduct::with('products', 'supplier', 'purchase')->where('purchase_id', $id)->first();
        $pdf = \PDF::loadView('backend.admin.purchase.invoice', compact('invoice', 'invoiceProducts'));
        return $pdf->stream('invoice.pdf');
    }

    public function purchaseEdit($id)
    {
        $purchaseEdit = Purchase::with('purchaseProduct', 'supplier', 'purchaseProductCount')->find($id);
        //return $purchaseProductCount->qty;
        $suppliers = Supplier::all();
        $products = Product::where('status', 1)->get();
        return view('backend.admin.purchase.edit', compact('purchaseEdit', 'suppliers', 'products'));
    }

    public function purchaseUpdate(Request $request, Purchase $purchase)
    {
        $this->validate($request, [
            'supplier_id' => 'required|integer',
            'payment_type' => 'required|string',
            'types' => 'required',
        ]);

        \DB::transaction(function () use ($request, $purchase){
            $purchase->supplier_id = $request->supplier_id;
            $purchase->payment_type = $request->payment_type;
            $purchase->purchase_date = $request->purchase_date;
            $lastInvoiceID = $purchase->orderBy('id', 'desc')->pluck('id')->first();
            $purchase->invoice_no = '000'.($lastInvoiceID + 1);
            $purchase->types = $request->types;
            $purchase->acc_no = $request->acc_no;
            $purchase->bank_name = $request->bank_name;
            $purchase->branch_name = $request->branch_name;
            $purchase->acc_name = $request->acc_name;
            $purchase->swift_address = $request->swift_address;
            $purchase->tax = $request->tax;
            $purchase->vat = $request->vat;
            $purchase->shipping_cost = $request->shipping_cost;
            $purchase->misc_cost = $request->misc_cost;
            $purchase->grand_total = $request->grand_total;
            $purchase->previous_balance = $request->previous_balance;
            $purchase->net_total = $request->net_total;
            $purchase->paid_amount = $request->paid_amount;
            $purchase->due_amount = $request->due_amount;
            $purchase->created_by = Session::get('name');
            $purchase->save();

            if (!empty($purchase)) {
                Supplier::updateOrCreate(
                    [
                        'id' => $request->supplier_id
                    ],
                    [
                        'daily_paid' => $request->paid_amount,
                        'previous_due' => $request->due_amount,
                        'balance' => $request->net_total,
                    ]
                );
            }

            if (!empty($purchase) && $request->filled('product_id')) {
                $purchase->purchaseProduct()->delete();
                foreach ($request->product_id as $key => $item) {
                    $purchaseProduct = new PurchaseProduct();
                    $purchaseProduct->purchase_id = $purchase->id;
                    $purchaseProduct->supplier_id = $request->supplier_id;
                    $purchaseProduct->product_id = $request->product_id[$key];
                    $purchaseProduct->sku = $request->sku[$key];
                    $purchaseProduct->condition = $request->condition[$key];
                    $purchaseProduct->unit_name = $request->unit[$key];
                    $purchaseProduct->available_qty = $request->qty[$key];
                    $purchaseProduct->rate = $request->rate[$key];
                    $purchaseProduct->total = $request->total[$key];
                    $purchaseProduct->save();

                    if ($purchaseProduct->save()) {
                        PurchaseProduct::updateOrCreate(
                            [
                                'product_id' => $request->product_id[$key]
                            ],
                            [
                                'available_qty' => $request->available_qty[$key],
                                'purchase_id' => $purchase->id,
                            ]
                        );

                        ProductQtyCount::updateOrCreate(
                            [
                                'product_id' => $request->product_id[$key]
                            ],
                            [
                                'qty' => $request->available_qty[$key],
                                'purchase_id' => $purchase->id,
                                'purchase_product_id' => $purchaseProduct->id,
                            ]
                        );

                        Stock::updateOrCreate(
                            [
                                'product_id' => $request->product_id[$key]
                            ],
                            [
                                'in_qty' => $request->available_qty[$key],
                                'purchase_id' => $purchase->id,
                                'supplier_id' => $request->supplier_id,
                                'purchase_price' => $request->net_total,
                            ]
                        );
                    }
                }
            }
        });

        Toastr::success('ProductTrait Purchase has been successfully updated', 'Success');
        return redirect('/purchase/index');
    }

    public function purchaseProductDelete($id)
    {
        $purchaseProduct = Purchase::find($id);
        $purchaseProduct->delete();
        Toastr::success('ProductTrait Purchase has been successfully deleted', 'Success');
        return redirect()->back();
    }
}

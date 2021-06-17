<?php

namespace App\Http\Controllers;

use App\Model\DailyPaid;
use App\Model\Purchase;
use App\Model\PurchaseProduct;
use App\Model\Supplier;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::with('purchase')->orderBy('created_at', 'desc')->get();
        return view('backend.admin.supplier.manage', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.supplier.add');
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
            'mobile_no_one'  => 'nullable|unique:suppliers',
            'office_contact' => 'nullable|unique:suppliers',
            'email_two'      => 'nullable|unique:suppliers',
            'email_one'      => 'nullable|unique:suppliers',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $lastInvoiceID = $supplier->orderBy('id', 'desc')->pluck('id')->first();
        $supplier->invoice_no = '000'.($lastInvoiceID + 1);
        $supplier->receipt_no = 'Diplomacy - '.($lastInvoiceID + 1);
        $supplier->mobile_no_one = $request->mobile_no_one;
        $supplier->email_one = $request->email_one;
        $supplier->address_one = $request->address_one;
        $supplier->city_one = $request->city_one;
        $supplier->country_one = $request->country_one;
        $supplier->fax_no = $request->fax_no;
        $supplier->office_contact = $request->office_contact;
        $supplier->email_two = $request->email_two;
        $supplier->address_two = $request->address_two;
        $supplier->city_two = $request->city_two;
        $supplier->country_two = $request->country_two;
        $supplier->supplier_web = $request->supplier_web;
//        $supplier->previous_due = $request->previous_due;
//        $supplier->previous_advance = $request->previous_advance;
//        $supplier->balance = $request->balance;
        $supplier->save();
        Toastr::success('Add new Supplier', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('backend.admin.supplier.view', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::where('id', $id)->first();
        return view('backend.admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'           => 'required',
            'mobile_no_one'  => 'nullable|unique:suppliers,mobile_no_one,'.$id,
            'office_contact' => 'nullable|unique:suppliers,office_contact,'.$id,
            'email_two'      => 'nullable|email|unique:suppliers,email_two,'.$id,
            'email_one'      => 'nullable|email|unique:suppliers,email_one,'.$id,
        ]);

        $supplier = Supplier::find($id);

        $supplier->name = $request->name;
        $supplier->mobile_no_one = $request->mobile_no_one;
        $supplier->email_one = $request->email_one;
        $supplier->address_one = $request->address_one;
        $supplier->city_one = $request->city_one;
        $supplier->country_one = $request->country_one;
        $supplier->fax_no = $request->fax_no;
        $supplier->office_contact = $request->office_contact;
        $supplier->email_two = $request->email_two;
        $supplier->address_two = $request->address_two;
        $supplier->city_two = $request->city_two;
        $supplier->country_two = $request->country_two;
        $supplier->supplier_web = $request->supplier_web;
//        $supplier->previous_due = $request->previous_due;
//        $supplier->previous_advance = $request->previous_advance;
//        $supplier->balance = $request->balance;
        $supplier->save();
        Toastr::success('Supplier has been Updated', 'success');
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        Toastr::success('Supplier has been Temporary Deleted', 'success');
        return redirect()->back();
    }

    public function trashList()
    {
        $trashSupplier = Supplier::onlyTrashed()->get();
        return view('backend.admin.supplier.trash-list', compact('trashSupplier'));
    }

    public function restore($supplier)
    {
        $restore = Supplier::onlyTrashed()->where('id', $supplier);
        $restore->restore();
        Toastr::success('Supplier has been Restored', 'success');
        return redirect()->back();
    }

    public function permantlyDelete($supplier)
    {
        Supplier::where('id', $supplier)->forceDelete();
        Toastr::success('Supplier has been Permanently Delete', 'success');
        return redirect()->back();
    }

    public function supplierAdvance(Supplier $supplier)
    {
        return view('backend.admin.supplier.advance', compact('supplier'));
    }

    public function supplierAdvanceUpdate(Request $request, Supplier $supplier)
    {
        \DB::transaction(function () use ($request, $supplier) {
            $supplier->daily_paid = $request->daily_paid;
            $supplier->previous_due = $request->debit_amount;
            $supplier->previous_advance = $request->credit_amount;
            $supplier->balance = $request->balance;
            $supplier->save();

            if ($supplier->save()) {
                $dailyPaid = new DailyPaid();
                $dailyPaid->supplier_id = $supplier->id;
                $dailyPaid->daily_paid = $request->daily_paid;
                $dailyPaid->debit_amount = $request->debit_amount;
                $dailyPaid->credit_amount = $request->credit_amount;
                $dailyPaid->balance = $request->balance;
                $dailyPaid->save();
            }
        });
        Toastr::success('Supplier Debit Amount Updated', 'success');
        return redirect('/supplier/money-receipts');
    }

    public function supplierMoneyReceipts()
    {
        $suppliers = DailyPaid::with('supplier')->whereNotNull('supplier_id')->orderByDesc('id')->get();
        return view('backend.admin.supplier.vouser-list', compact('suppliers'));
    }

    public function supplierReceipt($id)
    {
        $supplier = DailyPaid::with('supplier')->find($id);
        return view('backend.admin.supplier.vouser', compact('supplier'));
    }

    public function supplierReceiptDownload($id)
    {
        $supplier = DailyPaid::with('customer')->find($id);
        $pdf = \PDF::loadView('backend.admin.supplier.receipt', compact('supplier'));

        return $pdf->stream('Receipt.pdf');
    }

    public function supplierInvoice($id)
    {
        $supplier = Supplier::where('id', $id)->first();
        $pdf = \PDF::loadView('backend.admin.supplier.invoice', compact('supplier'));
        return $pdf->stream('invoice.pdf');
    }
}

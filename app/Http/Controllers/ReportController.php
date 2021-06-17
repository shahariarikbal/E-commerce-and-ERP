<?php

namespace App\Http\Controllers;

use App\Model\Purchase;
use App\Model\Sale;
use App\Model\SaleProduct;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function todaySalesReport()
    {
        $date = Carbon::now()->startOfDay();
        $sales = Sale::where('created_at', '>=', $date)->with('saleProduct', 'customer')->has('saleProduct')->get();
        //dd($sales);
        return view('backend.admin.reports.today-sales-report', compact('sales'));
    }

    public function todaySalesReportPdf($id)
    {
        $todaySaleReportPdf = Sale::with('saleProduct', 'customer')->find($id);
        $salesReportPdf = \PDF::loadView('backend.admin.reports.sale-pdf', compact('todaySaleReportPdf'));
        return $salesReportPdf->stream('Sale.pdf');
    }

    public function todayPurchaseReport()
    {
        $date = Carbon::now()->startOfDay();
        $purchase = Purchase::where('created_at', '>=', $date)->with('purchaseProduct', 'supplier', 'purchaseProductCount')->get();
        //dd($sales);
        return view('backend.admin.reports.today-purchase-report', compact('purchase'));
    }

    public function todayCustomerReceipt()
    {
        $date = Carbon::now()->startOfDay();
        $sales = Sale::where('created_at', '>=', $date)->with('saleProduct', 'customer')->has('saleProduct')->get();
        //dd($sales);
        return view('backend.admin.reports.today-customer-receipt', compact('sales'));
    }

    public function customerReceipt($id)
    {
        $saleProduct = SaleProduct::where('sale_id', $id)->with('sale', 'customer')->has('sale')->first();
        return view('backend.admin.reports.customer-receipt', compact('saleProduct'));
    }

    public function customerReceiptDownload($id)
    {
        $todayCustomerReceipt = SaleProduct::where('id', $id)->with('sale', 'customer')->has('sale')->first();
        $todayCustomerReceiptView = \PDF::loadView('backend.admin.reports.receipt', compact('todayCustomerReceipt'));
        return $todayCustomerReceiptView->stream('Receipt.pdf');
    }

    public function todayPurchaseReportPdf($id)
    {
        $todayPurchaseReportPdf = Purchase::with('purchaseProduct', 'supplier')->find($id);
        $purchaseReportPdf = \PDF::loadView('backend.admin.reports.purchase-pdf', compact('todayPurchaseReportPdf'));
        return $purchaseReportPdf->stream('Purchase.pdf');
    }

    public function dueSalesReport()
    {
        $salesDueReport = Sale::with('saleProduct', 'customer')->get();
        return view('backend.admin.reports.due-sales-report', compact('salesDueReport'));
    }

    public function duePurchaseReport()
    {
        $purchaseDueReport = Purchase::with('purchaseProduct', 'supplier')->get();
        return view('backend.admin.reports.due-purchase-report', compact('purchaseDueReport'));
    }

    public function profitReport()
    {
        $salesProfitReports = SaleProduct::with('sale', 'product')->get();
        return view('backend.admin.reports.profit-report', compact('salesProfitReports'));
    }
}

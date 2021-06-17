<?php

namespace App\Http\Controllers;

use App\Model\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stocks()
    {
        $stockes = Stock::with('products','accessories', 'purchase', 'sales')->orderBy('created_at', 'DESC')->get();
        return view('backend.admin.stock.manage', compact('stockes'));
    }
}

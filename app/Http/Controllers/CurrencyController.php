<?php

namespace App\Http\Controllers;

use App\Model\Currency;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $page = 'index';
        $data = Currency::all();
        return view('backend.admin.currency.index', compact('data', 'page'));
    }

    public function create()
    {
        $page = 'create';
        $data = '';
        return view('backend.admin.currency.index', compact('data', 'page'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);

        $currency = new Currency();
        $currency->name = strtolower($request->name);
        $currency->price = $request->price;
        $currency->slug = strtolower($request->name);
        $currency->save();
        Toastr::success('Currency create successfully', 'Success');
        return redirect('/admin/currency/index');
    }

    public function edit(Currency $currency)
    {
        $page = 'edit';
        $data = '';
        return view('backend.admin.currency.index', compact('data', 'page', 'currency'));
    }

    public function update(Request $request, Currency $currency)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);

        $currency->name = strtolower($request->name);
        $currency->slug = strtolower($request->name);
        $currency->price = $request->price;
        $currency->save();
        Toastr::success('Currency updated successfully', 'Success');
        return redirect('/admin/currency/index');
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();
        Toastr::success('Currency delete successfully', 'Success');
        return redirect()->back();
    }
}

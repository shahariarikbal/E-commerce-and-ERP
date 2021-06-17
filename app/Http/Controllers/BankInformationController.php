<?php

namespace App\Http\Controllers;

use App\Model\BankInformation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BankInformationController extends Controller
{
    public function bankInformation()
    {
        return view('version-1.fontend.bank.page');
    }

    public function bankInformationStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191|string',
            'bank_name' => 'required|max:191|string',
            'account_no' => 'required|max:15|min:12',
            'swift_code' => 'required|max:191|string',
            'cart_no' => 'required|max:15|min:12',
            'country_name' => 'required|max:191|string',
        ]);

        $telrInformation = new BankInformation();
        $telrInformation->name = $request->name;
        $telrInformation->bank_name = $request->bank_name;
        $telrInformation->account_no = $request->account_no;
        $telrInformation->swift_code = $request->swift_code;
        $telrInformation->cart_no = $request->cart_no;
        $telrInformation->country_name = $request->country_name;
        $telrInformation->save();
        return redirect('https://secure.telr.com/merchant/login.html');
    }
}

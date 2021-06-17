<?php

namespace App\Http\Controllers;

use App\Model\Condition;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function index()
    {
        $page = 'index';
        $data = Condition::all();
        return view('backend.admin.condition.index', compact('data', 'page'));
    }

    public function create()
    {
        $page = 'create';
        $data = '';
        return view('backend.admin.condition.index', compact('data', 'page'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string'
        ]);

        $condition = new Condition();
        $condition->name = $request->name;
        $condition->save();
        Toastr::success('Condition has been successfully inserted', 'Success');
        return redirect('/products/condition');
    }

    public function edit($id)
    {
        $page = 'edit';
        $data = Condition::find($id);
        return view('backend.admin.condition.index', compact('data', 'page'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|string'
        ]);

        $condition = Condition::find($id);
        $condition->name = $request->name;
        $condition->save();
        Toastr::success('Condition has been successfully updated', 'Success');
        return redirect('/products/condition');
    }

    public function destroy($id)
    {
        $condition = Condition::find($id);
        $condition->delete();
        Toastr::success('Condition has been successfully deleted', 'Success');
        return redirect()->back();
    }
}

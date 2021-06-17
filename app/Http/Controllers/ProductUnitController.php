<?php

namespace App\Http\Controllers;

use App\Model\ProductUnit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProductUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = ProductUnit::all();
        return view('backend.admin.unit.manage', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.unit.add');
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
            'name' => 'required',
            'status' => 'required'
        ]);
        foreach ($request->name as $key => $unit) {
            $unit = new ProductUnit();
            $unit->name = $request->name[$key];
            $unit->status = $request->status[$key];
            $unit->save();
        }
        Toastr::success('Add new Unit', 'Success');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ProductUnit $productUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productUnit = ProductUnit::find($id);
        return view('backend.admin.unit.edit', compact('productUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductUnit $productUnit)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);
        $productUnit->name = $request->name;
        $productUnit->status = $request->status;
        $productUnit->save();
        Toastr::success('Unit has been Updated', 'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ProductUnit  $productUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productUnit = ProductUnit::find($id);
        $productUnit->delete();
        Toastr::success('Unit has been deleted', 'Success');
        return redirect()->back();
    }

    public function active($id)
    {
        $productUnit = ProductUnit::find($id);
        $productUnit->status = 'inactive';
        $productUnit->save();
        Toastr::success('Unit has been successfully Inactivated', 'success');
        return redirect()->back();
    }

    public function inactive($id)
    {
        $productUnit = ProductUnit::find($id);
        $productUnit->status = 'active';
        $productUnit->save();
        Toastr::success('Unit has been successfully Activated', 'success');
        return redirect()->back();
    }
}

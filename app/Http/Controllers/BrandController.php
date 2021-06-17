<?php

namespace App\Http\Controllers;

use App\Model\Brand;
use App\Model\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.admin.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.brand.add');
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

        foreach ($request->name as $key => $category) {
            $newBrand = new Brand();
            $newBrand->name = $request->name[$key];
            $newBrand->status = $request->status[$key];
            $newBrand->save();
        }

        Toastr::success('Brand has been successfully created', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);

        $brand->name = $request->name;
        $brand->status = $request->status;
        $brand->save();

        Toastr::success('Brand has been successfully created', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        Toastr::success('Brand has been successfully deleted', 'success');
        return redirect()->back();
    }

    public function active(Brand $brand)
    {
        $brand->status = 'inactive';
        $brand->save();
        Toastr::success('Category has been successfully Inactivated', 'success');
        return redirect()->back();
    }

    public function inactive(Brand $brand)
    {
        $brand->status = 'active';
        $brand->save();
        Toastr::success('Brand has been successfully Activated', 'success');
        return redirect()->back();
    }
}

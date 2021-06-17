<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Subcategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('backend.admin.subcategory.manage', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        return view('backend.admin.subcategory.add', compact('categories'));
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
            'cat_id' => 'required|integer',
            'name' => 'required|string|unique:subcategories',
            'status' => 'required|string',
        ]);

        $subcategory = new Subcategory();
        $subcategory->cat_id = $request->cat_id;
        $subcategory->name = $request->name;
        $subcategory->status = $request->status;
        $subcategory->save();
        Toastr::success('Subcategory has been successfully created', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::where('status', 'active')->get();
        return view('backend.admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $this->validate($request, [
            'cat_id' => 'required|integer',
            'name' => 'required|string',
            'status' => 'required|string',
        ]);
        $subcategory->cat_id = $request->cat_id;
        $subcategory->name = $request->name;
        $subcategory->status = $request->status;

        if($request->priority == null){
            $subcategory->priority = 10000;
        }else{
            $subcategory->priority = $request->priority;
        }

        $subcategory->save();
        Toastr::success('Subcategory has been successfully updated', 'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        Toastr::success('Subcategory has been successfully deleted', 'Success');
        return redirect()->back();
    }

    public function active(Subcategory $subcategory)
    {
        $subcategory->status = 'inactive';
        $subcategory->save();
        Toastr::success('Subcategory has been successfully Inactivated', 'success');
        return redirect()->back();
    }

    public function inactive(Subcategory $subcategory)
    {
        $subcategory->status = 'active';
        $subcategory->save();
        Toastr::success('Subcategory has been successfully Activated', 'success');
        return redirect()->back();
    }
}

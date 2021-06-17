<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.admin.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.category.add');
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
            $categoryMain = new Category();
            $categoryMain->name = $request->name[$key];
            $categoryMain->status = $request->status[$key];
            $categoryMain->save();
        }

        Toastr::success('Category has been successfully created', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required'
        ]);

        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        Toastr::success('Category has been successfully updated', 'success');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        Toastr::success('Category has been successfully deleted', 'success');
        return redirect()->back();
    }

    public function active(Category $category)
    {
        $category->status = 'inactive';
        $category->save();
        Toastr::success('Category has been successfully Inactivated', 'success');
        return redirect()->back();
    }

    public function inactive(Category $category)
    {
        $category->status = 'active';
        $category->save();
        Toastr::success('Category has been successfully Activated', 'success');
        return redirect()->back();
    }
}

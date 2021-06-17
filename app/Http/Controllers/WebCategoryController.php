<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\WebCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebCategoryController extends Controller
{
    public function index()
    {
        $webCategories = WebCategory::with('category')->get();
        return view('backend.admin.setting.category.index', compact('webCategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.admin.setting.category.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'cat_id' => 'required'
        ]);
        $imageName = time().'_'.'.'. $request->image->extension();
        $request->image->move(('category'), $imageName);

        $webCategory = new WebCategory();
        $webCategory->image = $imageName;
        $webCategory->cat_id = $request->cat_id;
        $webCategory->save();
        Toastr::success('Category has been successfully created', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cat_id' => 'required'
        ]);

        $webCategoryUpdate = WebCategory::find($id);
        if($request->hasfile('image'))
        {
            if (file_exists(('category/'.$webCategoryUpdate->image))) {
                unlink(('category/'.$webCategoryUpdate->image));
            }
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(('category'), $imageName);
            $webCategoryUpdate->image = $imageName;
            $webCategoryUpdate->save();
        }

        $webCategoryUpdate->cat_id = $request->cat_id;
        $webCategoryUpdate->save();
        Toastr::success('Category has been successfully update', 'success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $editCategory = WebCategory::find($id);
        $categories = Category::all();
        return view('backend.admin.setting.category.edit', compact('editCategory', 'categories'));
    }

    public function destroy($id)
    {
        $webCategoryDelete = WebCategory::find($id);
        $webCategoryDelete->delete();
        Toastr::success('Category has been successfully deleted', 'success');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\WebBrand;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class WebBrandController extends Controller
{
    public function index()
    {
        $page = 'index';
        $data = WebBrand::all();
        return view('backend.admin.setting.brand.index', compact('page', 'data'));
    }

    public function create()
    {
        $page = 'create';
        $data = '';
        return view('backend.admin.setting.brand.index', compact('page', 'data'));
    }

    public function edit($id)
    {
        $page = 'edit';
        $data = WebBrand::find($id);
        return view('backend.admin.setting.brand.index', compact('page', 'data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'image' => 'required'
        ]);

        $imageName = time().'_'.'.'. $request->image->extension();
        $request->image->move(('brand'), $imageName);

        $webBrand = new WebBrand();
        $webBrand->name = $request->name;
        $webBrand->image = $imageName;
        $webBrand->save();
        Toastr::success('Brand has been successfully created', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $webBrand = WebBrand::find($id);
        if ($request->hasFile('image')) {
            if (file_exists(('brand/'.$webBrand->image))) {
                unlink(('brand/'.$webBrand->image));
            }
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(('brand'), $imageName);
            $webBrand->image = $imageName;
            $webBrand->save();
        }

        $webBrand->name = $request->name;
        $webBrand->save();
        Toastr::success('Brand has been successfully updated', 'success');
        return redirect('/web/brands');
    }

    public function destroy($id)
    {
        $webBrand = WebBrand::find($id);
        $webBrand->delete();
        Toastr::success('Brand has been successfully Deleted', 'success');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\WebManufacture;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class WebManufactureController extends Controller
{
    public function index()
    {
        $page = 'index';
        $data = WebManufacture::all();
        return view('backend.admin.setting.manufacture.index', compact('page', 'data'));
    }

    public function create()
    {
        $page = 'create';
        $data = '';
        return view('backend.admin.setting.manufacture.index', compact('page', 'data'));
    }

    public function edit($id)
    {
        $page = 'edit';
        $data = WebManufacture::find($id);
        return view('backend.admin.setting.manufacture.index', compact('page', 'data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);
        $webManufacture = WebManufacture::find($id);
        if ($request->hasFile('image')) {
            if (file_exists(('manufacture/'.$webManufacture->image))) {
                unlink(('manufacture/'.$webManufacture->image));
            }
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(('manufacture'), $imageName);
            $webManufacture->image = $imageName;
            $webManufacture->save();
        }

        $webManufacture->name = $request->name;
        $webManufacture->save();
        Toastr::success('Manufacture has been successfully updated', 'success');
        return redirect('/web/manufacture');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'image' => 'required'
        ]);

        $imageName = time().'_'.'.'. $request->image->extension();
        $request->image->move(('manufacture'), $imageName);

        $webBrand = new WebManufacture();
        $webBrand->name = $request->name;
        $webBrand->image = $imageName;
        $webBrand->save();
        Toastr::success('Manufacture has been successfully created', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $webBrand = WebManufacture::find($id);
        $webBrand->delete();
        Toastr::success('Manufacture has been successfully Deleted', 'success');
        return redirect()->back();
    }
}

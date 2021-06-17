<?php

namespace App\Http\Controllers;

use App\Model\Banner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $page = 'index';
        $data = Banner::orderBy('created_at', 'desc')->get();
        return view('backend.admin.banner.index', compact('page', 'data'));
    }

    public function create()
    {
        $page = 'create';
        $data = '';
        return view('backend.admin.banner.index', compact('page', 'data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
        ]);

        if ($request->filled('image_link')){
            $banner = new Banner();
            $banner->type = $request->type;
            $banner->image = $request->image_link;
            $banner->save();
        }else {
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(('banner'), $imageName);

            $banner = new Banner();
            $banner->type = $request->type;
            $banner->image = url('/banner/'.$imageName);
            $banner->save();
        }
        Toastr::success('Banner image has been successfully uploaded', 'Success');

        return redirect()->back();

    }

    public function edit(Banner $banner)
    {
        $page = 'edit';
        $data = '';
        return view('backend.admin.banner.index', compact('page', 'data', 'banner'));
    }

    public function update(Banner $banner, Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
        ]);

        if($request->hasfile('image'))
        {
            if ($banner->image) {
                file_exists(public_path('banner/').$banner->image);
            }
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(('banner'), $imageName);
            $banner->image = url('/banner/'.$imageName);
            $banner->save();
        }

        $banner->type = $request->type;
        $banner->save();
        Toastr::success('Banner image has been successfully updated', 'Success');
        return redirect('/web/banner/images');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        Toastr::success('Banner image has been successfully deleted', 'Success');
        return redirect()->back();
    }
}

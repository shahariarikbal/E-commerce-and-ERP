<?php

namespace App\Http\Controllers;

use App\Model\Country;
use App\Model\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $page = 'index';
        $data = Country::all();
        return view('backend.admin.setting.country.index', compact('page', 'data'));
    }

    public function create()
    {
        $page = 'create';
        $data = '';
        return view('backend.admin.setting.country.index', compact('page', 'data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);

        $countryName = new Country();
        $countryName->name = $request->name;
        $countryName->save();
        Toastr::success('Country has been successfully added', 'Success');
        return redirect()->back();
    }

    public function edit($id)
    {
        $page = 'edit';
        $data = Country::find($id);
        return view('backend.admin.setting.country.index', compact('page', 'data'));
    }

    public function update(Request $request, Country $country)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);

        $country->name = $request->name;
        $country->save();
        Toastr::success('Country has been successfully Updated', 'Success');
        return redirect()->back();
    }

    public function destroy(Country $country)
    {
        $country->delete();
        Toastr::success('Country has been successfully Deleted', 'Success');
        return redirect()->back();
    }


    // Video Information

    public function videoList()
    {
        $page = 'index';
        $data = Video::all();
        return view('backend.admin.setting.video.index', compact('page', 'data'));
    }

    public function videoCreate()
    {
        $page = 'create';
        $data = '';
        return view('backend.admin.setting.video.index', compact('page', 'data'));
    }

    public function videoStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'code' => 'required|string|max:191',
        ]);

        $video = new Video();
        $video->name = $request->name;
        $video->code = $request->code;
        $video->save();
        Toastr::success('Video has been successfully added', 'Success');
        return redirect()->back();
    }

    public function videoEdit($id)
    {
        $page = 'edit';
        $data = Video::find($id);
        return view('backend.admin.setting.video.index', compact('page', 'data'));
    }

    public function videoUpdate(Request $request, Video $video)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'code' => 'required|string|max:191',
        ]);

        $video->name = $request->name;
        $video->code = $request->code;
        $video->save();
        Toastr::success('Video has been successfully Updated', 'Success');
        return redirect()->back();
    }

    public function videoDestroy(Video $video)
    {
        $video->delete();
        Toastr::success('Video has been successfully Deleted', 'Success');
        return redirect()->back();
    }
}

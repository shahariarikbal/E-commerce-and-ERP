<?php

namespace App\Http\Controllers;

use App\Model\About;
use App\Model\Contact;
use App\Model\Team;
use App\Model\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('backend.admin.setting.about.index', compact('about'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'note' => 'required'
        ]);

        $aboutUs = About::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'note' => $request->note
            ]
        );

        Toastr::success('AboutUs update successfully', 'Success');
        return redirect()->back();
    }

    public function contactIndex()
    {
        $contact = Contact::first();
        return view('backend.admin.setting.contact.index', compact('contact'));
    }

    public function contactStore(Request $request)
    {
        $this->validate($request, [
            'note' => 'required'
        ]);

        $contact = Contact::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'note' => $request->note
            ]
        );

        Toastr::success('Contact update successfully', 'Success');
        return redirect()->back();
    }

    public function showTeamForm()
    {
        $data = '';
        $page = 'create';
        return view('backend.admin.setting.team.index', compact('data', 'page'));
    }

    public function teamIndex()
    {
        $data = Team::all();
        $page = 'index';
        return view('backend.admin.setting.team.index', compact('data', 'page'));
    }

    public function teamEdit($id)
    {
        $data = Team::find($id);
        $page = 'edit';
        return view('backend.admin.setting.team.index', compact('data', 'page'));
    }

    public function teamStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'avatar' => 'required'
        ]);

        $imageName = time().'_'.'.'. $request->avatar->extension();
        $request->avatar->move(('team'), $imageName);

        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->avatar = $imageName;
        $team->save();
        Toastr::success('Team has been successfully created', 'success');
        return redirect()->back();
    }

    public function teamUpdate(Request $request, Team $team)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
        ]);

        if ($request->hasFile('avatar')) {
            if (file_exists(('team/'.$team->avatar))) {
                unlink(('team/'.$team->avatar));
            }

            $imageName = time().'_'.'.'. $request->avatar->extension();
            $request->avatar->move(('team'), $imageName);
            $team->avatar = $imageName;
            $team->save();
        }

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->save();
        Toastr::success('Team has been successfully created', 'success');
        return redirect()->back();
    }

    public function teamDelete(Team $team)
    {
        $team->delete();
        Toastr::success('Team has been successfully deleted', 'success');
        return redirect()->back();
    }


    public function showTestimonialForm()
    {
        $data = '';
        $page = 'create';
        return view('backend.admin.setting.testimonial.index', compact('data', 'page'));
    }

    public function testimonialIndex()
    {
        $data = Testimonial::all();
        $page = 'index';
        return view('backend.admin.setting.testimonial.index', compact('data', 'page'));
    }

    public function testimonialEdit($id)
    {
        $data = Testimonial::find($id);
        $page = 'edit';
        return view('backend.admin.setting.testimonial.index', compact('data', 'page'));
    }

    public function testimonialStore(Request $request)
    {
        $this->validate($request, [
            'note' => 'required',
            'designation' => 'required|string|max:191',
            'avatar' => 'required'
        ]);

        $imageName = time().'_'.'.'. $request->avatar->extension();
        $request->avatar->move(('testimonial'), $imageName);

        $team = new Testimonial();
        $team->note = $request->note;
        $team->designation = $request->designation;
        $team->avatar = $imageName;
        $team->save();
        Toastr::success('Testimonial has been successfully created', 'success');
        return redirect()->back();
    }

    public function testimonialUpdate(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'note' => 'required',
            'designation' => 'required|string|max:191',
        ]);

        if ($request->hasFile('avatar')) {
            if (file_exists(('testimonial/'.$testimonial->avatar))) {
                unlink(('testimonial/'.$testimonial->avatar));
            }

            $imageName = time().'_'.'.'. $request->avatar->extension();
            $request->avatar->move(('testimonial'), $imageName);
            $testimonial->avatar = $imageName;
            $testimonial->save();
        }

        $testimonial->note = $request->note;
        $testimonial->designation = $request->designation;
        $testimonial->save();
        Toastr::success('Testimonial has been successfully created', 'success');
        return redirect()->back();
    }

    public function testimonialDelete(Team $team)
    {
        $team->delete();
        Toastr::success('Testimonial has been successfully deleted', 'success');
        return redirect()->back();
    }
}

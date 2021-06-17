<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use App\User;
use Illuminate\Http\Request;
use Session;
class AdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('backend.admin.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin){
            if (password_verify($request->password, $admin->password)){
                Session::put('id', $admin->id);
                Session::put('name', $admin->name);
                Session::put('role', $admin->role);
                Session::put('admin', $admin );
                // Session::put('users', $admin->users);
                // Session::put('customer', $admin->customer);
                // Session::put('currency', $admin->currency);
                // Session::put('supplier', $admin->supplier);
                // Session::put('purchase', $admin->purchase);
                // Session::put('sale', $admin->sale);
                // Session::put('stock', $admin->stock);
                // Session::put('report', $admin->report);
                // Session::put('account', $admin->account);
                // Session::put('website', $admin->website);



                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin/login')->with('error', 'Password dose not match');
            }

        }else{
            return redirect('/admin/login')->with('error', 'E-mail dose not match');
        }
    }

    public function adminLogout()
    {
        Session::forget('id');
        Session::forget('name');
        return redirect('/admin/login');
    }

    // user



    public function manageUser(){
        return view('backend.admin.user.manage');
    }

    public function createUser(){
        return view('backend.admin.user.create');
    }



    public function storeUser(Request $r){


            $validated = $r->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:admins',
                'password' => 'required|min:8',
                'role' => 'required',
            ]);

            $user = new Admin;

            $user->name     = $r->name;
            $user->email    = $r->email;
            $user->password = bcrypt($r->password);
            $user->role     = $r->role;



            if ($r->role == "admin") {
                $user->users    = 1;
                $user->customer = 1;
                $user->currency = 1;
                $user->supplier = 1;
                $user->purchase = 1;
                $user->product  = 1;
                $user->sale     = 1;
                $user->stock    = 1;
                $user->report   = 1;
                $user->account  = 1;
                $user->website  = 1;
            }

            $user->save();

            session()->flash('my_success', 'User successfully saved');
            return redirect('admin/user/manage');

    }



    public function editUser($id){

        $user = Admin::find($id);

        return view('backend.admin.user.edit', compact('user'));
    }

    public function updateUser(Request $r, $id){


            $validated = $r->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:admins,email,' . $id,
                'role' => 'required',
            ]);

            $user = Admin::find($id);

            if ($user == null) {
                return redirect()->back();
            }

            $user->name     = $r->name;
            $user->email    = $r->email;
            if ($r->password != null or $r->password != '') {   
                $user->password = bcrypt($r->password);
            }
            $user->role     = $r->role;

            if ($r->role == "admin") {
                $user->users    = 1;
                $user->customer = 1;
                $user->currency = 1;
                $user->supplier = 1;
                $user->purchase = 1;
                $user->product  = 1;
                $user->sale     = 1;
                $user->stock    = 1;
                $user->report   = 1;
                $user->account  = 1;
                $user->website  = 1;
            }else{                
                $user->users    = 0;
                $user->customer = 0;
                $user->currency = 0;
                $user->supplier = 0;
                $user->purchase = 0;
                $user->product  = 0;
                $user->sale     = 0;
                $user->stock    = 0;
                $user->report   = 0;
                $user->account  = 0;
                $user->website  = 0;
            }

            $user->save();

            session()->flash('my_success', 'User successfully updated');
            return redirect('admin/user/manage');
    }



    public function userDelete(Request $r, $id){

        if( Admin::find($id) != null ){

            Admin::find($id)->delete();            

            session()->flash('my_success', 'User successfully deleted');
            return redirect('admin/user/manage');

        }else{
            return redirect()->back();
        }
    }

    public function permission(Request $r){

        return view('backend.admin.user.permission');
    }

    public function permissionUpdate( Request $r, $id){
        // return $id;

        $user = Admin::find($id);

        if ($user == null) {
            return redirect()->back();            
        }


        if( isset( $r->users ) ){ $user->users    = 1; }else{ $user->users    = 0; }
        if( isset( $r->customer ) ){ $user->customer = 1; }else{ $user->customer = 0; }
        if( isset( $r->currency ) ){ $user->currency = 1; }else{ $user->currency = 0; }
        if( isset( $r->supplier ) ){ $user->supplier = 1; }else{ $user->supplier = 0; }
        if( isset( $r->purchase ) ){ $user->purchase = 1; }else{ $user->purchase = 0; }
        if( isset( $r->product ) ){ $user->product = 1; }else{ $user->product = 0; }
        if( isset( $r->sale ) ){ $user->sale     = 1; }else{ $user->sale     = 0; }
        if( isset( $r->stock ) ){ $user->stock    = 1; }else{ $user->stock    = 0; }
        if( isset( $r->report ) ){ $user->report   = 1; }else{ $user->report   = 0; }
        if( isset( $r->account ) ){ $user->account  = 1; }else{ $user->account  = 0; }
        if( isset( $r->website ) ){ $user->website  = 1; }else{ $user->website  = 0; }


        $user->save();

        session()->flash('my_success', 'Permission successfully set for the user');
        return redirect()->back();
    }
}

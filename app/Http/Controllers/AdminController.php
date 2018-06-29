<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Scholarship;
use Auth;
use Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function profile()
    {

        $admins         = Auth::user();
        $scholarships   = $admins->scholarship()->get();
        return view('admin.profile', compact('scholarships', 'admins'));
    }

    public function editPhoto()
    {
        $users = Auth::user();
        return view('test', compact('users'));
    }

    public function updatePhoto(Request $request)
    {
        // dd($request->file('avatar'));
        $users = Auth::user();
        $avatar = $request->file('avatar')->store('avatar');
        $request->user()->update([
            'avatar'    => $avatar
        ]);

        return redirect()->back();
    }

     public function index()
    {
        $id             = Auth::user()->id;
        $admins         = Admin::find($id);
        $scholarships   = $admins->scholarship()->orderBy('created_at','desc')->get();
        return view('admin', compact('scholarships'));
    }

    public function update(Request $request)
    {
        $admins = Auth::user();

        if($request->file('avatar') != null){
            Storage::delete($admins->avatar);
            $image  = $request->file('avatar')->store('avatar/admins');
        } else{
            $image  = $admins->avatar;
        }


        $admins->update([
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'jobPosition'   => $request->input('jobPosition'),
            'address'       => $request->input('address'),
            'avatar'        => $image,
        ]);

        session()->flash('profileNotif', 'Edit Profile Succesful!');
        return redirect()->route('admin.profile');
    }

    public function changePassword(Request $request)
    {
        // dd($request->get('current-password'));
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            session()->flash('invalidPassword', 'Your current password does not matches with the password you provided. Please try again.');
            return redirect()->back();

        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            session()->flash('invalidPassword', 'New Password cannot be same as your current password. Please choose a different password.');
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        session()->flash('passwordChanged', 'Your Password Has Been Changed.');
        return redirect()->back();
    }

}

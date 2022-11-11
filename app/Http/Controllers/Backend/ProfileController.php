<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function Profile()
    {
        return view('backend.users.profile.update-profile');
    }
    public function UpdateProfile(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:50",
            "email" => "required|email",
            "avatar" => "image|mimes:jpg,png,jpeg,gif,svg|max:1048",
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        // Update photo delete old image
        if ($request->hasFile('avatar')) {
            if (File::exists("images/avatar/" . $user->avatar)) {
                File::delete("images/avatar/" . $user->avatar);
            }
            $avatar = $request->file("avatar");
            $user->avatar = "avatar_" . uniqid() . "." . $request->file('avatar')->extension();
            $avatar->move(\public_path("images/avatar/"), $user->avatar);
            $request['avatar'] = $user->avatar;
        }
        // return $user;
        $user->update();
        return redirect()->back()->with('success', 'Success Update Profile');
    }
    public function Password()
    {
        return view('backend.users.profile.change-password');
    }
    public function UpdatePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords not matches
            return redirect()->back()->with("error", "Your current password does not matches with the old password.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success", "Password successfully changed!");
    }
}

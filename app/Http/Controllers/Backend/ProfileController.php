<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
    	$user = User::find($id);

    	return view('backend.user.view_profile', compact('user'));
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        return view('backend.user.edit_profile', compact('data'));
    }

    public function store(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
    	$data->email = $request->email;
    	$data->telephone = $request->telephone;
    	$data->address = $request->address;
    	$data->gender = $request->gender;

        if ($request->file('image')) {
            $file = $request->file('image');
    		@unlink(public_path('upload/user_images/' . $data->image));
    		$filename = date('YmdHi') . $file->getClientOriginalName();  //getClientOriginalName => 12/2/22 file.jpg
    		$file->move(public_path('upload/user_images'), $filename);
    		$data['image'] = $filename;
        }
        $data->save();

        $notification = [
            'message' => 'User Profile Updated Successfully',
    		'alert-type' => 'success'
        ];

        return redirect()->route('profile.view')->with($notification);
    }

    //------------------- Password Change---------------------------//
    public function passwordIndex()
    {
        return view('backend.user.edit_password');
    }

    public function passwordUpdate(Request $request)
    {
        $data = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required | confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
    		$user = User::find(Auth::id());
    		$user->password = Hash::make($request->password);
    		$user->save();
    		Auth::logout();
    		return redirect()->route('login');
    	} else {
            return redirect()->back();
        }
    }

}

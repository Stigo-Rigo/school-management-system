<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
    //     $allData = User::all();
    //     return view ('backend.user.view_user', compact('allData')) or

        $data['allData'] = User::all();
        return view ('backend.user.view_user', $data);
    }

    public function create()
    {
        return view('backend.user.add_user');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required'
        ]);

        $user = new User();
        $user->user_role = $request->user_role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $notification = [
            'message' => 'User Added Succcessfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('users.view')->with($notification);
    }

    public function edit($id)
    {
        $data = User::find($id);
        
        return view('backend.user.edit_user', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->user_role;
        $user->save();

        $notification = [
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('users.view')->with($notification);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = [
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('users.view')->with($notification);
    }
}
 
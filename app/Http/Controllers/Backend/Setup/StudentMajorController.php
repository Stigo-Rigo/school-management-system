<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentMajor;
use Illuminate\Http\Request;

class StudentMajorController extends Controller
{
    public function index()
    {
        $data['allData'] = StudentMajor::all();
        return view('backend.setup.major.view_major', $data);
    }

    public function create()
    {
        return view('backend.setup.major.add_major');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | unique:student_majors,name',
        ]);

        $major = new StudentMajor();
        $major->name = $request->name;
        $major->save();

        $notification = array(
    		'message' => 'Major Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.major.view')->with($notification);
    }

    public function edit($id)
    {
        $data = StudentMajor::find($id);
        return view('backend.setup.major.edit_major', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $major = StudentMajor::find($id);
        $major->name = $request->name;
        $major->save();

        $notification = [
            'message' => 'Major Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('student.major.view')->with($notification);
    }

    public function destroy($id)
    {
        $major = StudentMajor::find($id);
        $major->delete();

        $notification = [
            'message' => 'Major Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.major.view')->with($notification);
    }
}

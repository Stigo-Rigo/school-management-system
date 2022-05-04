<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.class.view_class', $data);
    }

    public function create()
    {
        return view('backend.setup.class.add_class');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | unique:student_classes,name'
        ]);

        $class = new StudentClass();
        $class->name = $request->name;
        $class->save();

        $notification = array(
    		'message' => 'Class Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.class.view')->with($notification);
    }

    public function edit($id)
    {
        $data = StudentClass::find($id);
        return view('backend.setup.class.edit_class', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $class = StudentClass::find($id);
        $class->name = $request->name;
        $class->save();

        $notification = [
            'message' => 'Class Name Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('student.class.view')->with($notification);
    }

    public function destroy($id)
    {
        $class = StudentClass::find($id);
        $class->delete();

        $notification = [
            'message' => 'Class Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.class.view')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function index()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    public function create()
    {
        return view('backend.setup.shift.add_shift');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | unique:student_shifts,name'
        ]);

        $shift = new StudentShift();
        $shift->name = $request->name;
        $shift->save();

        $notification = array(
    		'message' => 'Shift Added Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('student.shift.view')->with($notification);
    }

    public function edit($id)
    {
        $data = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $shift = StudentShift::find($id);
        $shift->name = $request->name;
        $shift->save();

        $notification = [
            'message' => 'Shift Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function destroy($id)
    {
        $shift = StudentShift::find($id);
        $shift->delete();

        $notification = [
            'message' => 'Shift Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.shift.view')->with($notification);
    }
}

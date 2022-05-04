<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function index ()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    }

    public function create ()
    {
        return view('backend.setup.year.add_year');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | unique:student_years,name',
        ]);

        $year = new StudentYear();
        $year->name = $request->name;
        $year->save();

        $notification = array(
    		'message' => 'Year Added Successfully',
    		'alert-type' => 'success'
    	);

        return redirect()->route('student.year.view')->with($notification);
    }

    public function edit($id)
    {
        $data = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $year = StudentYear::find($id);
        $year->name = $request->name;
        $year->save();

        $notification = [
            'message' => 'Year Name Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('student.year.view')->with($notification);
    }

    public function destroy($id)
    {
        $year = StudentYear::find($id);
        $year->delete();

        $notification = [
            'message' => 'Year Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('student.year.view')->with($notification);
    }
}

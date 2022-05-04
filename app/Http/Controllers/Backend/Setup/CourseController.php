<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $data['allData'] = Course::all();
    	return view('backend.setup.school_course.view_school_course', $data);
    }

    public function create()
    {
        return view('backend.setup.school_course.add_school_course');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:courses,name',
            
        ]);

        $data = new Course();
        $data->name = $request->name;
        $data->save();

        $notification = [
            'message' => 'Course Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('school.course.view')->with($notification);
    }

    public function edit($id)
    {
        $data = Course::find($id);
	    return view('backend.setup.school_course.edit_school_course', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Course::find($id);
     
        $validatedData = $request->validate([
    		'name' => 'required|unique:courses,name,'. $data->id
    		
    	]);

    	$data->name = $request->name;
    	$data->save();

    	$notification = [
    		'message' => 'Course Updated Successfully',
    		'alert-type' => 'success'
        ];

    	return redirect()->route('school.course.view')->with($notification);
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        $notification = [
            'message' => 'Course Deleted Successfully',
            'alert-type' => 'info'
        ];

	   return redirect()->route('school.course.view')->with($notification);
    }
}

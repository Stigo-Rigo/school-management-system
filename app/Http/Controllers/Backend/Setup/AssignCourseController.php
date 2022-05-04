<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignCourse;
use App\Models\Course;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignCourseController extends Controller
{
    public function index()
    {
        $data['allData'] = AssignCourse::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_course.view_assign_course', $data);
    }

    public function create()
    {
        $data['courses'] = Course::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.assign_course.add_assign_course', $data);
    }

    public function store(Request $request)
    {
        $course_count = count($request->course_id);
        if ($course_count != NULL) {
            for ($i=0; $i<$course_count; $i++) {
                $assign_course = new AssignCourse();
                $assign_course->class_id = $request->class_id;
                $assign_course->course_id = $request->course_id[$i];
                $assign_course->full_mark = $request->full_mark[$i];
                $assign_course->pass_mark = $request->pass_mark[$i];
                $assign_course->subjective_mark = $request->subjective_mark[$i];
                $assign_course->save();
            }
        }
        $notification = [
            'message' => 'Course assignment inserted successlly',
            'alert-type' => 'success'
        ];

        return redirect()->route('assign.course.view')->with($notification);
    }

    public function edit($class_id)
    {
        $data['editData'] = AssignCourse::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        $data['courses'] = Course::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.assign_course.edit_assign_course', $data);
    }

    public function update(Request $request,$class_id)
    {
    	if ($request->course_id == NULL) {
        
        $notification = [
    		'message' => 'Sorry You do not select any Subject',
    		'alert-type' => 'error'
        ];

    	return redirect()->route('assign.course.edit', $class_id)->with($notification);
    		 
    	} else {
            $countClass = count($request->course_id);
            AssignCourse::where('class_id',$class_id)->delete(); 
            for ($i=0; $i <$countClass ; $i++) { 
                $assign_course = new AssignCourse();
                $assign_course->class_id = $request->class_id;
                $assign_course->course_id = $request->course_id[$i];
                $assign_course->full_mark = $request->full_mark[$i];
                $assign_course->pass_mark = $request->pass_mark[$i];
                $assign_course->subjective_mark = $request->subjective_mark[$i];
                $assign_course->save();
            } 
        }

        $notification = [
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('assign.course.view')->with($notification);
    }

    public function details($class_id)
    {
        $data['details'] = AssignCourse::where('class_id', $class_id)->orderBy('course_id', 'asc')->get();

        return view('backend.setup.assign_course.assign_course_details', $data);
    }
}

<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\RegisterStudent;
use App\Models\StudentClass;
use App\Models\StudentMajor;
use App\Models\StudentShift;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class RegisterStudentController extends Controller
{
    public function index()
    {
        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();

    	$data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
    	$data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
    	// dd($data['class_id']);
    	$data['allData'] = RegisterStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
    	return view('backend.student.register_student.view_student', $data);
    }

    public function yearClassWise(Request $request)
    {
        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();

    	$data['year_id'] = $request->year_id;
    	$data['class_id'] = $request->class_id;
    	 
    	$data['allData'] = RegisterStudent::where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
    	return view('backend.student.register_student.view_student', $data);
    }

    public function create()
    {
        $data['years'] = StudentYear::all();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentMajor::all();
    	$data['shifts'] = StudentShift::all();
    	return view('backend.student.register_student.add_student', $data);
    }
}

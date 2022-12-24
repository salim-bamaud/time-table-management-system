<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Department;
use App\Models\Level;
use App\Models\Lecturer;
use App\Http\Requests\CourseAddRequest;
use App\Http\Requests\CourseEditRequest;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $departments = Department::select('id','name')->get();
        $levels = Level::select('id','name')->get();
        $lecturers = Lecturer::select('id','name')->get();
        return view('dashboard.courses.add',compact('departments','levels','lecturers'));
    }
    public function store(CourseAddRequest $request){
        Course::create([
            'name' => $request->name,
            'type' => $request->type,
            'dep_id' => $request->type,
            'lev_id' => $request->type,
            'lecr_id' => $request->type,
        ]);
        return redirect()->back()->with(['success'=>'تم الحفظ بنجاح']);
    }
    public function show(){
        $courses = Course::select('id','name','dep_id','lev_id','lecr_id','type')->get();
        return view('dashboard.courses.show',compact('courses'));
    }

    public function edit($id){
        $departments = Department::select('id','name')->get();
        $levels = Level::select('id','name')->get();
        $lecturers = Lecturer::select('id','name')->get();
        $course = Course::find($id);
        if(!$course)
            return redirect()->back();
        return view('dashboard.courses.edit',compact('course','departments','levels','lecturers'));
    }
    public function update(CourseEditRequest $request,$id){
        $course = Course::find($id);
        if(!$course)
            return redirect()->back();
        $course -> update($request -> all());
        return redirect(route('courses.show'))->with(['success'=>'تم التعديل بنجاح']);
    }
    public function delete($id){
        $course = Course::find($id);
        if(!$course)
            return redirect()->back();
        $course -> delete();
        return redirect(route('courses.show'))->with(['success'=>'تم الحذف بنجاح']);
    }
}

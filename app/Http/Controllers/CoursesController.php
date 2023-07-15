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
        if ($request->type == '1'){
            Course::create([
                'name' => $request->name . ' عملي ',
                'type' => $request->type,
                'time_units_in_week' => $request->time_units_in_week,
                'dep_id' => $request->dep_id,
                'lev_id' => $request->lev_id,
            ]);
        }
        Course::create([
            'name' => $request->name,
            'type' => 0,
            'time_units_in_week' => $request->time_units_in_week,
            'dep_id' => $request->dep_id,
            'lev_id' => $request->lev_id,
        ]);
        return redirect()->back()->with(['success'=>'تم الحفظ بنجاح']);
    }
    public function show(){
        $courses = Course::select('id','name','dep_id','lect_id','lev_id','type','time_units_in_week')->get();
        $departments = Department::all();
        $levels = Level::all();
        return view('dashboard.courses.show',compact('courses','departments','levels'));
    }
    
    public function connect($id)
    {
        $course = Course::find($id);
        // Get the available teachers and pass them to the view
        $lecturers = Lecturer::all();
        return view('dashboard.courses.connect', compact('course', 'lecturers'));
    }

    public function assign($id, Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'lect_id' => 'required|exists:lecturers,id',
        ]);
        $course = Course::find($id);
        // Assign the course to the selected teacher
        $lecturer = Lecturer::find($validated['lect_id']);
        $course->lecturer()->associate($lecturer);
        $course->save();

        // Redirect back to the courses list
        return redirect(route('courses.show'))->with(['success'=>'تم التعديل بنجاح']);
    }

    public function edit($id){
        $departments = Department::select('id','name')->get();
        $levels = Level::select('id','name')->get();
        $course = Course::find($id);
        if(!$course)
            return redirect()->back();
        return view('dashboard.courses.edit',compact('course','departments','levels'));
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
            return redirect(route('courses.show'));
        $course -> delete();
        return redirect(route('courses.show'))->with(['success'=>'تم الحذف بنجاح']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time_table;
use App\Models\Course;
use App\Models\Department;
use App\Models\Level;
use App\Models\Lecturer;
use App\Models\Room;

class TablesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('dashboard.tables.add');
    }
    public function create_table(Request $request){
        //dd($request);
        $courses = Course::where('lev_id',$request->lev_id)->get();
        $lecturers = Lecturer::select('id','name','short_name')->get();
        $department = Department::where('id',$request->dep_id)->first(); 
        $level = Level::where('id',$request->lev_id)->first();
        $rooms = Room::where('seats_num', '>=' , $level->students_num)->get();
        return view('dashboard.tables.create-table',compact('courses','lecturers','rooms','department','level'));
    }
    
    public function store(CourseAddRequest $request){
        Course::create([
            'name' => $request->name,
            'type' => $request->type,
            'dep_id' => $request->dep_id,
            'lev_id' => $request->lev_id,
        ]);
        return redirect()->back()->with(['success'=>'تم الحفظ بنجاح']);
    }
    public function show(){
        $tables = Time_table::select('id','name','dep_id','lev_id')->get();
        return view('dashboard.tables.show',compact('tables'));
    }

    public function edit($id){
        $table = Time_table::find($id);
        if(!$table)
            return redirect()->back();
        return view('dashboard.tables.edit',compact('table'));
    }
    public function update(CourseEditRequest $request,$id){
        $course = Course::find($id);
        if(!$course)
            return redirect()->back();
        $course -> update($request -> all());
        return redirect(route('courses.show'))->with(['success'=>'تم التعديل بنجاح']);
    }
    public function delete($id){
        $table = Time_table::find($id);
        if(!$table)
            return redirect()->back();
        $table -> delete();
        return redirect(route('tables.show'))->with(['success'=>'تم الحذف بنجاح']);
    }
}

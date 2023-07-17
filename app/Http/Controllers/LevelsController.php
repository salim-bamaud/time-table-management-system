<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Department;
use App\Models\Time_table;
use App\Http\Requests\LevelAddRequest;
use App\Http\Requests\LevelEditRequest;

class LevelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $departments = Department::select('id','name')->get();
        return view('dashboard.levels.add',compact('departments'));
    }
    public function store(LevelAddRequest $request){
        Level::create([
            'name' => $request->name,
            'dep_id' => $request->dep_id,
            'students_num' => $request->students_num,
        ]);
        return redirect()->back()->with(['success'=>'تم الحفظ بنجاح']);
    }
    public function show(){
        $departments = Department::all();
        $levels = Level::select('id','name','dep_id','students_num')->get();
        return view('dashboard.levels.show',compact('levels', 'departments'));
    }

    public function show_table($id){
        $table = Time_table::where('lev_id',$id)->first();
        if ($table) {
            return redirect(route('tables.show-table',['id'=>$table->id]));
        } else {
            return redirect()->back()->with(['message'=>'لم يتم انشاء الجدول ']);
        }
        
    }

    public function edit($id){
        //return $id;
        //return Level::findOrFail($id);
        $level = Level::find($id);
        if(!$level)
            return redirect()->back();
        $departments = Department::select('id','name')->get();
        return view('dashboard.levels.edit',compact('level','departments'));
    }
    public function update(LevelEditRequest $request,$id){
        $level = Level::find($id);
        if(!$level)
            return redirect()->back();
        $level -> update($request -> all());
        return redirect(route('levels.show'))->with(['success'=>'تم التعديل بنجاح']);
    }
    public function delete($id){
        $level = Level::find($id);
        if(!$level)
            return redirect()->back();
        $level -> delete();
        return redirect(route('levels.show'))->with(['success'=>'تم الحذف بنجاح']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Http\Requests\LecturerAddRequest;
use App\Http\Requests\LecturerEditRequest;

class LecturersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('dashboard.lecturers.add');
    }
    public function store(LecturerAddRequest $request){
        Lecturer::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
        ]);
        return redirect()->back()->with(['success'=>'تم الحفظ بنجاح']);
    }
    public function show(){
        $lecturers = Lecturer::select('id','name','short_name')->get();
        return view('dashboard.lecturers.show',compact('lecturers'));
    }

    public function edit($id){
        $lecturer = Lecturer::find($id);
        if(!$lecturer)
            return redirect()->back();
        return view('dashboard.lecturers.edit',compact('lecturer'));
    }
    public function update(LecturerEditRequest $request,$id){
        $lecturer = Lecturer::find($id);
        if(!$lecturer)
            return redirect()->back();
        $lecturer -> update($request -> all());
        return redirect(route('lecturers.show'))->with(['success'=>'تم التعديل بنجاح']);
    }
    public function delete($id){
        $lecturer = Lecturer::find($id);
        if(!$lecturer)
            return redirect()->back();
        $lecturer -> delete();
        return redirect(route('lecturers.show'))->with(['success'=>'تم الحذف بنجاح']);
    }
}

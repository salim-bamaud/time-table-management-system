<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Lecturer;
use App\Models\Time_unit;
use App\Http\Requests\LecturerAddRequest;
use App\Http\Requests\LecturerEditRequest;
use PDF;

class LecturersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $departments = Department::all();
        return view('dashboard.lecturers.add',compact('departments'));
    }
    public function store(LecturerAddRequest $request){
        Lecturer::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'collage' => $request->collage,
            'dep_id' => $request->dep_id,
            'degree' => $request->degree,
            'contract_status' => $request->contract_status,
        ]);
        return redirect()->back()->with(['success'=>'تم الحفظ بنجاح']);
    }
    public function show(){
        $lecturers = Lecturer::select('id','name','short_name','collage','dep_id','degree','contract_status')->get();
        return view('dashboard.lecturers.show',compact('lecturers'));
    }
    public function show_table($id){
        $lecturer = Lecturer::find($id);
        $time_units = Time_unit::where('lecr_id',$id)->get();
        $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
        $times = ['8:00am - 9:40am','10:00am - 11:50am' , '12:00pm: - 1:30am'];
        return view('dashboard.lecturers.show-table',compact('lecturer','time_units','days', 'times'));
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

    public function export_teachers_in_pdf(){
        
        $lecturers = Lecturer::get();
        $pdf = PDF::loadView('pdf.test',compact('lecturers'));
        return $pdf->stream('test.pdf');
    }
}

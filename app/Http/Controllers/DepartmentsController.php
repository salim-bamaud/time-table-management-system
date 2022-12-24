<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepatmentAddRequest;
use App\Http\Requests\DepatmentEditRequest;
use App\Models\Department;
class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('dashboard.departments.add');
    }
    public function store(DepatmentAddRequest $request){
        // $validator = Validator::make($request->all(),['name'=>'required:rooms,name'],['name.required'=>'entrr naaammmeee.']);
        // // if($validator->fails()){
        // //     return $validator->errors();
        // // }
        //return redirect()->back()->withErrors($validator)->withInput($request->all());
        //return $request;
        Department::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with(['success'=>'تم الحفظ بنجاح']);
    }
    public function show(){
        $departments = Department::select('id','name')->get();
        return view('dashboard.departments.show',compact('departments'));
    }

    public function edit($id){
        //return $id;
        //return Department::findOrFail($id);
        $department = Department::find($id);
        if(!$department)
            return redirect()->back();
        return view('dashboard.departments.edit',compact('department'));
    }
    public function update(DepatmentEditRequest $request,$id){
        $department = Department::find($id);
        if(!$department)
            return redirect()->back();
        $department -> update($request -> all());
        return redirect(route('departments.show'))->with(['success'=>'تم التعديل بنجاح']);
    }
    public function delete($id){
        $department = Department::find($id);
        if(!$department)
            return redirect()->back();
        $department -> delete();
        return redirect(route('departments.show'))->with(['success'=>'تم الحذف بنجاح']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
use App\Models\Room;
use App\Http\Requests\RoomAddRequest;
use App\Http\Requests\RoomEditRequest;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('dashboard.addroom');
    }
    public function store(RoomAddRequest $request){
        // $validator = Validator::make($request->all(),['name'=>'required:rooms,name'],['name.required'=>'entrr naaammmeee.']);
        // // if($validator->fails()){
        // //     return $validator->errors();
        // // }
        //return redirect()->back()->withErrors($validator)->withInput($request->all());
        //return $request;
        Room::create([
            'name' => $request->name,
            'type' => $request->type,
            'seats_num' => $request->seats_num,
        ]);
        return redirect()->back()->with(['success'=>'تم الحفظ بنجاح']);
    }
    public function show(){
        $rooms = Room::select('id','name','type','seats_num')->get();
        return view('dashboard.rooms.show',compact('rooms'));
    }

    public function edit($id){
        //return $id;
        //return Room::findOrFail($id);
        $room = Room::find($id);
        if(!$room)
            return redirect()->back();
        return view('dashboard.rooms.edit',compact('room'));
    }
    public function update(RoomEditRequest $request,$id){
        $room = Room::find($id);
        if(!$room)
            return redirect()->back();
        $room -> update($request -> all());
        return redirect(route('rooms.show'))->with(['success'=>'تم التعديل بنجاح']);
    }
    public function delete($id){
        $room = Room::find($id);
        if(!$room)
            return redirect()->back();
        $room -> delete();
        return redirect(route('rooms.show'))->with(['success'=>'تم الحذف بنجاح']);
    }
}

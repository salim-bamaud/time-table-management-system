<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Validator;
use App\Models\Room;
use App\Models\Time_unit;
use App\Http\Requests\RoomAddRequest;
use App\Http\Requests\RoomEditRequest;
use PDF;

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
    public function findemptyrooms(){
        $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
        $times = ['8:00am - 9:40am','10:00am - 11:50am' , '12:00pm: - 1:30am'];
        return view('dashboard.rooms.findemptyroom',compact('days','times'));
    }
    public function findemptyroom($number){
        $rooms = Room::whereDoesntHave('time_units', function ($query) use ($number) {
            $query->where('number', $number);
        })->where('type',0)->get();
        $times = ['Sunday 8:00am - 9:40am','Sunday 10:00am - 11:50am' , 'Sunday 12:00pm: - 1:30am',
        'Monday 8:00am - 9:40am','Monday 10:00am - 11:50am' , 'Monday 12:00pm: - 1:30am',
        'Tuesday 8:00am - 9:40am','Tuesday 10:00am - 11:50am' , 'Tuesday 12:00pm: - 1:30am',
        'Wednesday 8:00am - 9:40am','Wednesday 10:00am - 11:50am' , 'Wednesday 12:00pm: - 1:30am',
        'Thursday 8:00am - 9:40am','Thursday 10:00am - 11:50am' , 'Thursday 12:00pm: - 1:30am',];
        return view('dashboard.rooms.showemptyroom',compact('rooms','number','times'));
    }
    public function findemptylaps(){
        $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
        $times = ['8:00am - 9:40am','10:00am - 11:50am' , '12:00pm: - 1:30am'];
        return view('dashboard.rooms.findemptylap',compact('days','times'));
    }
    public function findemptylap($number){
        $laps = Room::whereDoesntHave('time_units', function ($query) use ($number) {
            $query->where('number', $number);
        })->where('type',1)->get();
        $times = ['Sunday 8:00am - 9:40am','Sunday 10:00am - 11:50am' , 'Sunday 12:00pm: - 1:30am',
        'Monday 8:00am - 9:40am','Monday 10:00am - 11:50am' , 'Monday 12:00pm: - 1:30am',
        'Tuesday 8:00am - 9:40am','Tuesday 10:00am - 11:50am' , 'Tuesday 12:00pm: - 1:30am',
        'Wednesday 8:00am - 9:40am','Wednesday 10:00am - 11:50am' , 'Wednesday 12:00pm: - 1:30am',
        'Thursday 8:00am - 9:40am','Thursday 10:00am - 11:50am' , 'Thursday 12:00pm: - 1:30am',];
        return view('dashboard.rooms.showemptylap',compact('laps','number','times'));
    }
    public function show_table($id){
        $room = Room::find($id);
        $time_units = Time_unit::where('room_id',$id)->get();
        $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
        $times = ['8:00am - 9:40am','10:00am - 11:50am' , '12:00pm: - 1:30am'];
        return view('dashboard.rooms.show-table',compact('room','time_units','days', 'times'));
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

    public function export_rooms_in_pdf(){
        
        $rooms = Room::get();
        $pdf = PDF::loadView('pdf.rooms',compact('rooms'));
        return $pdf->stream('rooms.pdf');
    }
}

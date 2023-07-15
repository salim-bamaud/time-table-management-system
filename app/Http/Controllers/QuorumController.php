<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\Department;
use PDF;

class QuorumController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $departments = Department::all();
        return view('dashboard.quorum.show',compact('departments'));
    }

    public function print($id)
    {
        $department = Department::find($id);
        $lecturers = Lecturer::where('dep_id',$department->id)->get();
        $pdf = PDF::loadView('pdf.quorum',compact(['department','lecturers']),[],['orientation' => 'L']);
        return $pdf->stream('quorum.pdf');

    }
}

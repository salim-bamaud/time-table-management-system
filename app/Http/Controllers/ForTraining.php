<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Department;
use App\Models\Level;
use App\Models\Lecturer;
use App\Models\Room;

class ForTraining extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_courses(){
        ############################ get courses ########################################
        $courses = Course::select('id','name','dep_id','lev_id','lecr_id','type')->get();
        ############################ get departments ####################################
        $departments = Department::select('id','name')->get();
        ############################ get levels #########################################
        $levels = Level::select('id','name','dep_id','students_num')->get();
        ############################ get lecturers ######################################
        $lecturers = Lecturer::select('id','name','short_name')->get();
        ############################ get rooms ######################################
        $rooms = Room::select('id','name','type','seats_num')->get();
        #################################################################################
        return view('test',compact('courses','departments','levels','lecturers','rooms'));
    }
}

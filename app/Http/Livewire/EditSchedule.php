<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Time_unit;
use App\Models\Time_table;
use App\Models\Department;
use App\Models\Level;

class EditSchedule extends Component
{
    public $table;
    public $department;
    public $level;
    public $courses;
    public $rooms;
    public $teachers;
    public $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
    public $times = ['8:00am - 9:40am','10:00am - 11:50am' , '12:00pm: - 1:30am'];
    public $schedule = [];
    public $time_units;

    public $course;
    public $room;
    public $teacher;
    public function mount(){
        $this->time_units = Time_unit::where('time_table_id' , $this->table->id)->get();
        $this->courses = Course::all();
        $this->rooms = Room::all();
        $this->teachers = Lecturer::all();
        foreach($this->days as $key1=>$day){
            foreach($this->times as $key2=>$time){
                $this->course = $this->courses->where('id',$this->time_units->where('number',($key1*3+$key2+1))->first()->course_id)->first();
                $this->room = $this->rooms->where('id',$this->time_units->where('number',($key1*3+$key2+1))->first()->room_id)->first();
                $this->teacher = $this->teachers->where('id',$this->time_units->where('number',($key1*3+$key2+1))->first()->lecr_id)->first();
                $this->schedule[$day][$time] = ['course' => $this->course,
                                                'room'=> $this->room,
                                                'teacher'=> $this->teacher];

            }
        }
    }
    public function render()
    {
        return view('livewire.edit-schedule');
    }
}

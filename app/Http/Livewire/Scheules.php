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

class Scheules extends Component
{
    
    public $department;
    public $level;
    public $courses;
    public $rooms;
    public $teachers;
    public $timeunits;
    public $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
    public $times = ['8:00am - 9:40am','10:00am - 11:50am' , '12:00pm: - 1:30am'];
    public $schedule = [];
    public function mount(){
        // $this->courses = Course::all();
        // $this->rooms = Room::all();
        // $this->teachers = Lecturer::all();
        $this->timeunits = Time_unit::all();
        foreach($this->days as $day){
            foreach($this->times as $time){
                $this->schedule[$day][$time] = ['course' => '-',
                                                'room'=> '-',
                                                'teacher'=>'-'];
            }
        }
    }
    public function render()
    {
        return view('livewire.scheules');
    }
    
    public function saveSchedule()
    {
        //$this->validate();
        $table = Time_table::where('lev_id',$this->level->id)->first();
        if(!is_null($table))
            $table->delete();
        Time_table::create([
            'name' => Department::where('id',$this->department->id)->first()->name.' '.Level::where('id',$this->level->id)->first()->name.' Schedule',
            'dep_id' => $this->department->id,
            'lev_id' => $this->level->id,
        ]);
        foreach($this->days as $key1=>$day){
            foreach($this->times as $key2=>$time){
                if($this->schedule[$day][$time]['teacher'] != '-' && $this->schedule[$day][$time]['room'] != '-' && $this->schedule[$day][$time]['course'] != '-'){
                Time_unit::create([
                    'time_table_id' => Time_table::where('lev_id',$this->level->id)->first()->id,
                    'number' => ($key1*3+$key2+1),
                    'dep_id' => $this->department->id,
                    'lev_id' => $this->level->id,
                    'lecr_id' => $this->schedule[$day][$time]['teacher'],
                    'course_id' => $this->schedule[$day][$time]['course'],
                    'room_id' => $this->schedule[$day][$time]['room'],
                    'label' => Course::where('id',$this->schedule[$day][$time]['course'])->first()->name.' '.Room::where('id',$this->schedule[$day][$time]['room'])->first()->name.' '.Lecturer::where('id',$this->schedule[$day][$time]['teacher'])->first()->short_name
                ]);
            }
            }}
            session()->flash('message' , 'Saved Sucssefully.');
    }

    // public function deleteCourse($id){
    //     $this->courses = $this->courses->forget($id);
    // }
}
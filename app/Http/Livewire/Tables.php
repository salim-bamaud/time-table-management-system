<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Course;

class Tables extends Component
{
    public $courses;
    public $rooms;
    public $lecturers;
    public $department;
    public $level;
    public $selectedCourse1=null;
    public $selectedCourse2=null;
    public $selectedCourse3=null;
    public $selectedCourse4=null;
    public $selectedCourse5=null;
    public $selectedCourse6=null;
    public $selectedCourse7=null;
    public $selectedCourse8=null;
    public $selectedCourse9=null;
    public $selectedCourse10=null;
    public $selectedCourse11=null;
    public $selectedCourse12=null;
    public $selectedCourse13=null;
    public $selectedCourse14=null;
    public $selectedCourse15=null;
    public $selectedRoom1=null;
    public $selectedRoom2=null;
    public $selectedRoom3=null;
    public $selectedRoom4=null;
    public $selectedRoom5=null;
    public $selectedRoom6=null;
    public $selectedRoom7=null;
    public $selectedRoom8=null;
    public $selectedRoom9=null;
    public $selectedRoom10=null;
    public $selectedRoom11=null;
    public $selectedRoom12=null;
    public $selectedRoom13=null;
    public $selectedRoom14=null;
    public $selectedRoom15=null;

    public $selectedLecturer1=null;

    public function updatedSelectedCourse1(){
        if(is_numeric($this->selectedCourse1)){
        $courseType = Course::where('id' , $this->selectedCourse1)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse1);
        $this->selectedRoom1=null;
        }
    }
    public function updatedSelectedRoom1(){
        $this->selectedLecturer1=null;
    }
    public function updatedSelectedCourse2(){
        if(!($this->selectedCourse2=="label")){
        $courseType = Course::where('id' , $this->selectedCourse2)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse2);
        $this->selectedRoom2=null;
    }}
    public function updatedSelectedCourse3(){
        if(!($this->selectedCourse3=="label")){
        $courseType = Course::where('id' , $this->selectedCourse3)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse3);
        $this->selectedRoom3=null;
    }}
    public function updatedSelectedCourse4(){
        if(!($this->selectedCourse4=="label")){
        $courseType = Course::where('id' , $this->selectedCourse4)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse4);
        $this->selectedRoom4=null;
    }}
    public function updatedSelectedCourse5(){
        if(!($this->selectedCourse5=="label")){
        $courseType = Course::where('id' , $this->selectedCourse5)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse5);
        $this->selectedRoom5=null;
    }}
    public function updatedSelectedCourse6(){
        if(!($this->selectedCourse6=="label")){
        $courseType = Course::where('id' , $this->selectedCourse6)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse6);
        $this->selectedRoom6=null;
    }}
    public function updatedSelectedCourse7(){
        if(!($this->selectedCourse7=="label")){
        $courseType = Course::where('id' , $this->selectedCourse7)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse7);
        $this->selectedRoom7=null;
    }}
    public function updatedSelectedCourse8(){
        if(!($this->selectedCourse8=="label")){
        $courseType = Course::where('id' , $this->selectedCourse8)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse8);
        $this->selectedRoom8=null;
    }}
    public function updatedSelectedCourse9(){
        if(!($this->selectedCourse9=="label")){
        $courseType = Course::where('id' , $this->selectedCourse9)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse9);
        $this->selectedRoom9=null;
    }}
    public function updatedSelectedCourse10(){
        if(!($this->selectedCourse10=="label")){
        $courseType = Course::where('id' , $this->selectedCourse10)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse10);
        $this->selectedRoom10=null;
    }}
    public function updatedSelectedCourse11(){
        if(!($this->selectedCourse11=="label")){
        $courseType = Course::where('id' , $this->selectedCourse11)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse11);
        $this->selectedRoom11=null;
    }}
    public function updatedSelectedCourse12(){
        if(!($this->selectedCourse12=="label")){
        $courseType = Course::where('id' , $this->selectedCourse12)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse12);
        $this->selectedRoom12=null;
    }}
    public function updatedSelectedCourse13(){
        if(!($this->selectedCourse13=="label")){
        $courseType = Course::where('id' , $this->selectedCourse13)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse13);
        $this->selectedRoom13=null;
    }}
    public function updatedSelectedCourse14(){
        if(!($this->selectedCourse14=="label")){
        $courseType = Course::where('id' , $this->selectedCourse14)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse14);
        $this->selectedRoom14=null;
    }}
    public function updatedSelectedCourse15(){
        if(!($this->selectedCourse15=="label")){
        $courseType = Course::where('id' , $this->selectedCourse15)->first()->type;
        $this->rooms = Room::where('type', $courseType)->get();
        $this->courses = $this->courses->except($this->selectedCourse15);
        $this->selectedRoom15=null;
    }}

    public function render()
    {
        return view('livewire.tables');
    }
}

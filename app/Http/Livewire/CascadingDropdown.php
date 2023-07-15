<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\Level;

class CascadingDropdown extends Component
{

    public $departments = [];
    public $levels = [];
    public $dep_id;
    public $lev_id;

    public function mount(){
        $this->departments = Department::all();
    }

    public function render()
    {
        return view('livewire.cascading-dropdown');
    }

    public function changeDepartment(){
        if($this->dep_id != '-1'){
            $this->levels = Level::where('dep_id' , $this->dep_id)->get();
        }
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Time_unit;
use App\Models\Time_table;

class ShowTable extends Component
{
    public $table;
    public $time_units;
    public $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday'];
    public $times = ['8:00am - 9:40am','10:00am - 11:50am' , '12:00pm: - 1:30am'];
    public function mount($id){
        $this->table = Time_table::find($id);
        $this->time_units = Time_unit::Where('time_table_id',$id)->get();
    }
    public function render()
    {
        return view('livewire.show-table')
        ->extends('layouts.app') // the default is layout('layouts.app')
        ->section('content');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = "departments";
    protected $fillable = ['name','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    ################## courses relation ###############
    public function courses(){
        return $this->hasMany('App\Models\Course','dep_id');
    }
    ################## end course relation ###########

    ################## levels relation ###############
    public function levels(){
        return $this->hasMany('App\Models\Level','dep_id');
    }
    ################## end levels relation ###########
    ################## time ables relation ###############
    public function time_tables(){
        return $this->hasMany('App\Models\Time_table','dep_id');
    }
    ################## end time tables relation ###########
    ################## time unnits relation ###############
    public function time_units(){
        return $this->hasMany('App\Models\Time_unit','dep_id');
    }
    ################## end time units relation ###########
}

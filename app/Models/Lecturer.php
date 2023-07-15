<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $table = "lecturers";
    protected $fillable = ['name','collage','dep_id','degree','short_name','contract_status','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;


    ################## department relation ###############
    public function department(){
        return $this-> belongsTo('App\Models\Department','dep_id');
    }
    ################## end department relation ###########
    ################## courses relation ###############
    public function courses(){
        return $this->hasMany('App\Models\Course','lect_id');
    }
    ################## end course relation ###########
    ################## time units relation ###############
    public function time_units(){
        return $this->hasMany('App\Models\Time_unit','lecr_id');
    }
    ################## end time units relation ###########
}

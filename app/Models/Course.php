<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = "courses";
    protected $fillable = ['name','dep_id','lev_id','lecr_id','type','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    ################## department relation ###############
    public function department(){
        return $this-> belongsTo('App\Models\Department','dep_id');
    }
    ################## end department relation ###########
    ################## level relation ###############
    public function level(){
        return $this-> belongsTo('App\Models\Level','dep_id');
    }
    ################## end level relation ###########
    ################## lecturer relation ###############
    public function lecturer(){
        return $this-> belongsTo('App\Models\Lecturer','lecr_id');
    }
    ################## end level relation ###########
    ################## time unnits relation ###############
    public function time_units(){
        return $this->hasMany('App\Models\Time_unit','course_id');
    }
    ################## end time units relation ###########
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = "levels";
    protected $fillable = ['name','dep_id','students_num','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    ################## department relation ###############
    public function department(){
        return $this-> belongsTo('App\Models\Department','dep_id');
    }
    ################## end department relation ###########
    ################## courses relation ###############
    public function courses(){
        return $this->hasMany('App\Models\Course','lev_id');
    }
    ################## end course relation ###########
    ################## time ables relation ###############
    public function time_tables(){
        return $this->hasMany('App\Models\Time_table','dep_id');
    }
    ################## end time tables relation ###########
    ################## time units relation ###############
    public function time_units(){
        return $this->hasMany('App\Models\Time_unit','lev_id');
    }
    ################## end time units relation ###########
}

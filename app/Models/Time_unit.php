<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time_unit extends Model
{
    use HasFactory;
    protected $table = "time_units";
    protected $fillable = ['number','dep_id','lev_id','lecr_id','cours_id','room_id','time_table_id','label','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;


    ################## room relation ###############
    public function room(){
        return $this-> belongsTo('App\Models\Room','room_id');
    }
    ################## end room relation ###########
    ################# department relation ###############
    public function department(){
        return $this-> belongsTo('App\Models\Department','dep_id');
    }
    ################## end department relation ###########
    ################# level relation ###############
    public function level(){
        return $this-> belongsTo('App\Models\Level','lev_id');
    }
    ################## end level relation ###########
    ################# lecturer relation ###############
    public function lecturer(){
        return $this-> belongsTo('App\Models\Lecturer','lecr_id');
    }
    ################## end lecturer relation ###########
    ################# course relation ###############
    public function course(){
        return $this-> belongsTo('App\Models\Course','course_id');
    }
    ################## end course relation ###########
}

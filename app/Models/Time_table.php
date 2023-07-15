<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time_table extends Model
{
    use HasFactory;
    protected $table = "time_tables";
    protected $fillable = ['name','dep_id','lev_id','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

    ################## department relation ###############
    public function department(){
        return $this-> belongsTo('App\Models\Department','dep_id');
    }
    ################## end departmrnt relation ###########
    ################## level relation ###############
    public function level(){
        return $this-> belongsTo('App\Models\Level','lev_id');
    }
    ################## end level relation ###########

    ################## time unnits relation ###############
    public function time_units(){
        return $this->hasMany('App\Models\Time_unit','time_table_id');
    }
    ################## end time units relation ###########
    public function delete(){
        $this->time_units()->delete();
        parent::delete();
    }
}

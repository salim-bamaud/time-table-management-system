<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = "rooms";
    protected $fillable = ['name','type','seats_num','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;


    ################## time_units relation ###############
    public function time_units(){
        return $this->hasMany('App\Models\Time_unit','room_id');
    }
    ################## end time_units relation ###########
}

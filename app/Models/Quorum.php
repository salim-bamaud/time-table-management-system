<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quorum extends Model
{
    use HasFactory;
    protected $table = "quorum";
    protected $fillable = ['lec_id','course_id','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;
}

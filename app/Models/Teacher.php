<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function subjects(){
        return $this->belongsToMany('App\Models\Subject');
    }

    public function grades(){
        return $this->hasMany('App\Models\Grade');
    }
}

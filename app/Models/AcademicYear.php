<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{   
    protected $guarded = ['id'];
    use HasFactory;

    public function grades(){
        return $this->hasMany('App\Models\Grade');
    }

    public function students(){
        return $this->hasMany('App\Models\Student');
    }
}

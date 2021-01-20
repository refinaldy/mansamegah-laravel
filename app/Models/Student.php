<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function academic_year(){
        return $this->belongsTo('App\Models\AcademicYear');
    }

    public function grades(){
        return $this->belongsToMany('App\Models\Grade');
    }
}

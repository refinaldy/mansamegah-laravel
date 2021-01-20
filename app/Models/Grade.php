<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function academic_year(){
        return $this->belongsTo('App\Models\AcademicYear');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }

    public function students(){
        return $this->belongsToMany('App\Models\Student');
    }
}

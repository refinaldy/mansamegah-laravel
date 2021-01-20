<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function subject_group(){
        return $this->belongsTo('App\Models\SubjectGroup');
    }

    public function teachers(){
        return $this->belongsToMany('App\Models\Teacher');
    }
}

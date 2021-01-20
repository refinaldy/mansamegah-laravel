<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectGroup extends Model
{   
    protected $guarded = ['id'];
    
    use HasFactory;

    public function subjects(){
        return $this->hasMany('\App\Models\Subject' );
    }

    
}

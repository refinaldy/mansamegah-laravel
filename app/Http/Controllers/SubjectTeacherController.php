<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectTeacherController extends Controller
{
    public function create($id,$from_nav){

        $teacher = Teacher::find($id);
        $teachers = Teacher::get();
        
        $subjects = Subject::get();
        return view('subject_teacher.create', compact('teacher', 'subjects', 'teachers', 'from_nav'));
    }

    public function store(Request $request){
        
        $request->validate([
            'subject_teacher' => 'required'
        ]);
        
        
        $subject= Subject::where('subject_name', $request->subject_teacher)->first();
        
        $teacher = Teacher::where('nip', $request->nip)->first();
        
        $check = DB::table('subject_teacher')
                ->where('subject_id', '=', $subject->id)
                ->where('teacher_id', '=', $teacher->id)
                ->get()->first();
        
        if(empty($check)){  
            $teacher->subjects()->attach($subject->id);
        } 
        
        return redirect("/guru/$teacher->slug");
    }

    public function edit($subject_id, $teacher_id){

        $subject_teacher = DB::table('subject_teacher')
                            ->where('teacher_id', '=', $teacher_id )
                            ->where('subject_id', '=', $subject_id )
                            ->get()->first()->id;

        $teacher = Teacher::find($teacher_id);
        $subjects = Subject::get();

        return view('subject_teacher.edit', compact('subject_id', 'teacher', 'subjects', 'subject_teacher'));
    }

    public function update(Request $request,$id){
        
        $request->validate([
            'subject_teacher' => 'required'
        ]);
        
        $subject_teacher = DB::table('subject_teacher')->find($id);
        
        $teacher = Teacher::find($subject_teacher->teacher_id)->first();
        $subject = Subject::where('subject_name', $request->subject_teacher)->first();
        
        $old_subject = $request->old_subject;

        $teacher->subjects()->detach($old_subject);
        $teacher->subjects()->attach($subject->id);
        
        return redirect("/guru/$teacher->slug");
    }

    public function destroy($teacher_id, $subject_id){
        $teacher = Teacher::find($teacher_id);

        $teacher->subjects()->detach($subject_id); 
        
        return redirect("/guru/$teacher->slug");
    }
}

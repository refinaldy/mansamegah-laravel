<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Teacher;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class GradeController extends Controller{

                    // as single of academic year
    public function index($slug){

        $academic_year_id = getAcademicYearFromSlug($slug)->id;
        $grades = getGradeFromAcademicYearId($academic_year_id);

        $year = getAcademicYearFromId($academic_year_id);
        $teachers = getTeachers();

        return view('academic_year.grade.index', compact('grades', 'teachers', 'year'));
    }

    public function create($year_id){

        $year = getAcademicYearFromId($year_id);
        $grades = getGrades();
        
        $year_in_grade = getGradeFromAcademicYearId($year_id);

        if($year_in_grade->isEmpty()){
            $teachers = getTeachers();
        }else{
        
            $notAvailableTeachers = getGradeFromAcademicYearId($year_id);
            $teachers_id_na = array();

            foreach($notAvailableTeachers as $teacher){
                array_push($teachers_id_na, $teacher->teacher_id);
            }

            $allTeachers = getTeachers();
            $teachers_id_all = array();

            foreach($allTeachers as $teacher){
                array_push($teachers_id_all, $teacher->id);
            }

            $teachers_id = array_diff($teachers_id_all,$teachers_id_na);
            $teachers = array();
            
            foreach($teachers_id as $teacher){
                $getTeacherById = getTeacherFromId($teacher);
                if(!empty($getTeacherById)){
                    array_push($teachers, [
                        'nip' => $getTeacherById->nip,
                        'full_name' => $getTeacherById->full_name
                    ]);
                }
            }
        }

        $majors = getMajors();
        return view('academic_year.grade.create', compact('year','grades','teachers','majors'));
    }

    public function store(Request $request){   
        
        $request->validate([
            'teacher_nip' => 'required',
            'major' => 'required',
            'year_id' => 'required',
            'grade' => 'required',
            'grade_name' => 'required'
        ]);
        

        $year = getAcademicYearFromId($request->year_id);

        $grade_name = $request->grade . " " . $request->major . " " . $request->grade_name;
        $slug = $request->grade . "-" . $request->major . "-" . $request->grade_name . "-" . $year->slug ;
        
        $teacher_id= getTeacherFromNip($request->teacher_nip)->id;

        Grade::create([
            'teacher_id' => $teacher_id,
            'academic_year_id' => $request->year_id,
            'grade_name' => $grade_name,
            'slug' => $slug
        ]);

        return redirect("/kelas/tahun/$year->slug");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return view('grade_student.index', compact('grade_students'));
    }

    public function edit($id){
        $grade = getGradeFromId($id);
        $teacher_id = $grade->teacher_id;
        $year_id = $grade->academic_year_id;

        $teacher = getTeacherFromId($teacher_id);

        $grades = getGrades();
        $majors = getMajors();

        $gradeName = explode(" ", $grade->grade_name);
        
        $grade_id = $grade->id;
        $major_selected = $gradeName[1];
        $grade_selected = $gradeName[0];
        $grade_name =  $gradeName[2];
        $year_selected = getAcademicYearFromId($year_id)->year;
        
        return view('academic_year.grade.edit', compact('grade_id','year_id','grade_selected', 'teacher', 'major_selected', 'grade_name', 'majors', 'grades', 'year_selected'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'teacher_id' => 'required',
            'major' => 'required',
            'year_id' => 'required',
            'grade' => 'required',
            'grade_name' => 'required'
        ]);

        $gradeName = $request->grade . " " . $request->major . " " . $request->grade_name;
        
        $year = getAcademicYearFromId($request->year_id);

        Grade::where('id', $id)->update([
            'grade_name' => $gradeName
        ]);

        return redirect("/kelas/tahun/$year->slug");
    }

    public function destroy($id){
        $grade = getGradeFromId($id);
        $yearId = $grade->academic_year_id;
        $year = getAcademicYearFromId($yearId);
        $grade->delete();

        return redirect("/kelas/tahun/$year->slug");
    }
}

function getGrades(){
    return ['X', 'XI', 'XII'];
}

function getMajors(){
    return ['IPA', 'IPS'];
}

function getTeachers(){
    return Teacher::get();
}

function getTeacherFromId($id){
    return Teacher::where('id', $id)->get()->first();
}

function getTeacherFromNip($nip){
    return Teacher::where('nip', $nip)->get()->first();
}

function getAcademicYearFromSlug($slug){
    return AcademicYear::where('slug', $slug)->get()->first();
}

function getAcademicYearFromId($id){
    return AcademicYear::where('id', $id)->get()->first();
}

function getGradeFromId($id){
    return Grade::where('id', $id)->get()->first();
}

function getGradeFromAcademicYearId($academicYearId){
    return Grade::where('academic_year_id', $academicYearId)->get();
}



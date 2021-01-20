<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller{

    public function index($academic_year_slug){
        
        if($academic_year_slug == "0"){
            $years = getAcademicYears();
            return view('student.year_accepted', compact('years'));
        }

        $academic_year_id = getIdAcademicYearFromSlug($academic_year_slug);

        $students = Student::where('academic_year_id', $academic_year_id)
                            ->get();

        $year = findAcademicYearFromId($academic_year_id);
        
        return view('student.index', compact('students', 'year'));
    }

    public function create(){
        $years = getAcademicYears();
        $grades = getGrades();

        return view('student.create', compact('years', 'grades'));
    }

    public function store(Request $request){

        validate($request);
        
        $explodeName = explode(" ", $request->full_name);
        $first_name = $explodeName[0];
        $last_name = "";

        if(sizeof($explodeName) <= 2 && sizeof($explodeName)>1 ){
                $last_name = $explodeName[1];
        } else{
            for($i = 1; $i<sizeof($explodeName)-1; $i++){
                $last_name = $last_name. " " . $explodeName[$i];
            }
        }

        $full_name = Str::slug($request->full_name, "-");
        $slug = $full_name . "-" . $request->nis . "-" . $request->nisn;

        Student::create([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'first_name' => $first_name,
            'second_name' => $last_name,
            'student_image' => "",
            'accepted_to_class' => $request->grade_accepted,
            'academic_year_id' => $request->year_accepted,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'origin_school' => $request->origin_school,
            'fathers_name' => $request->fathers_name,
            'fathers_job' => $request->fathers_job,
            'fathers_address' => $request->fathers_address,
            'fathers_phone' => $request->fathers_phone,
            'mothers_name' => $request->mothers_name,
            'mothers_job' => $request->mothers_job,
            'mothers_address' => $request->mothers_address,
            'mothers_phone' => $request->mothers_phone,
            'caregivers_name' => $request->caregivers_name,
            'caregivers_job' => $request->caregivers_job,
            'caregivers_address' => $request->caregivers_address,
            'caregivers_phone' => $request->caregivers_phone,
            'gender' => $request->gender,
            'slug' => $slug,
            'address' => $request->address
        ]);
    
        $year = findAcademicYearFromId($request->year_accepted)->slug;
        return redirectToSiswa($year);
    }

    public function show($slug){
        
        $student = findStudentFromSlug($slug);

        return view('student.single', compact('student'));
    }

    public function edit($id){
        
        $student = findStudentFromId($id);
        $year_accepted_selected = findAcademicYearFromId($student->academic_year_id)->id;
        $grades = getGrades();
        $years = getAcademicYears();
        
        return view('student.edit', compact('student', 'year_accepted_selected', 'grades', 'years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        validate($request);
        
        $explodeName = explode(" ", $request->full_name);
        $first_name = $explodeName[0];
        $last_name = "";

        if(sizeof($explodeName) <= 2 && sizeof($explodeName)>1 ){
                $last_name = $explodeName[1];
        } else{
            for($i = 1; $i<sizeof($explodeName)-1; $i++){
                $last_name = $last_name. " " . $explodeName[$i];
            }
        }

        $full_name = Str::slug($request->full_name, "-");
        $slug = $full_name . "-" . $request->nis . "-" . $request->nisn;

        Student::find($id)->update([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'first_name' => $first_name,
            'second_name' => $last_name,
            'student_image' => "",
            'accepted_to_class' => $request->grade_accepted,
            'academic_year_id' => $request->year_accepted,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'origin_school' => $request->origin_school,
            'fathers_name' => $request->fathers_name,
            'fathers_job' => $request->fathers_job,
            'fathers_address' => $request->fathers_address,
            'fathers_phone' => $request->fathers_phone,
            'mothers_name' => $request->mothers_name,
            'mothers_job' => $request->mothers_job,
            'mothers_address' => $request->mothers_address,
            'mothers_phone' => $request->mothers_phone,
            'caregivers_name' => $request->caregivers_name,
            'caregivers_job' => $request->caregivers_job,
            'caregivers_address' => $request->caregivers_address,
            'caregivers_phone' => $request->caregivers_phone,
            'gender' => $request->gender,
            'slug' => $slug,
            'address' => $request->address
        ]);

        $year = findAcademicYearFromId($request->year_accepted)->slug;
        return redirectToSiswa($year);
    }

    public function destroy($id){
        $student = Student::find($id);
        $yearId = $student->get()->first()->academic_year_id;
        $year = findAcademicYearFromId($yearId)->slug;
        $student->delete(); 
        return redirectToSiswa($year);
    }

}

function getGrades(){
    return ['X', 'XI', 'XII'];
}

function getAcademicYears(){
    return AcademicYear::get();
}

function findAcademicYearFromId($id){
    return AcademicYear::where('id', $id)->get()->first();
}

function getIdAcademicYearFromSlug($slug){
    return AcademicYear::where('slug', $slug)->get()->first()->id;
}

function findStudentFromSlug($slug){
    return Student::where('slug', $slug)->get()->first();
}

function findStudentFromId($id){
    return Student::where('id', $id)->get()->first();
}

function validate(Request $request){
    return $request->validate([
        'nis' => 'required|min:3',
            'nisn' => 'required|min:3',
            'full_name' => 'required',
            'gender' => 'required',
            'grade_accepted' => 'required',
            'year_accepted' => 'required',
    ]);
}

function redirectToSiswa($year){
    return redirect("/siswa/tahun/$year");
}
<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::get();
        return view('teacher.index',compact('teachers'));
    }

    public function create(){
        $positions = getPositions();
        $subjects = Subject::get();
        return view('teacher.create', compact('positions', 'subjects'));
    }

    public function store(Request $request){   
        
        $request->validate([
            'photo' => 'mimes:jpeg,png,svg,jpg',
            'nip' => 'required|min:4|max:25',
            'name' => 'required|min:4|max:50',
            'gender' => 'required',
            'position' => 'required'
        ]);
        
        if($request->position == "0"){
            return;
        }

        $imgName = saveImg($request);

        Teacher::create([
            'nip' => $request->nip,
            'full_name' => $request->name ,
            'teacher_image' => $imgName,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'education' => $request->education,
            'phone_number' => $request->phone_number,
            'position' => $request->position,
            'slug' => Str::slug($request->name, '-')
        ]);

        return redirect('/guru');
    }

    public function show($slug){
        $teacher = Teacher::where('slug', $slug)->first();
        
        if($teacher == null){
            abort(404);
        }

        return view('teacher.single', compact('teacher'));
    }

    public function edit($id)
    {   
        $positions = getPositions();
        $teacher = Teacher::find($id);
        return view('teacher.edit', compact('teacher', 'positions'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'photo' => 'mimes:jpeg,png,svg,jpg',
            'nip' => 'required|min:4|max:25',
            'name' => 'required|min:4|max:50',
            'gender' => 'required',
            'position' => 'required'
        ]);
        
        
        $teacher = Teacher::where('id', $id)->first();
        $imgName = $teacher->teacher_image;
    
        if($request->photo){
            $imgName = saveImg($request);
        }
        
        Teacher::find($id)->update([
            'nip' => $request->nip,
            'full_name' => $request->name ,
            'teacher_image' => $imgName,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'education' => $request->education,
            'phone_number' => $request->phone_number,
            'position' => $request->position,
            'slug' => Str::slug($request->name, '-')
        ]);

        return redirect('/guru');
    }

    public function destroy($id)
    {
        Teacher::find($id)->delete();
        return redirect('/guru');
    }
}
function saveImg(Request $request){
    $imgName = null;
    if($request->photo){
        $imgName = $request->photo->getClientOriginalName() . '-' . time() . '-' . $request->nip 
                                    . '.' . $request->photo->extension() ;
        $request->photo->move(public_path('image'), $imgName);
    }

    return $imgName;
}

function getPositions(){
    return [
        "Kepala Sekolah", "Wakamad Kesiswaan", "Wali Kelas"
    ];
}
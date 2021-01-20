<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Support\Str;
use App\Models\SubjectGroup;
use Illuminate\Http\Request;

class SubjectGroupController extends Controller
{

    public function index(){
        $subject_groups = SubjectGroup::get();
        return view('subject_group.index', compact('subject_groups'));
    }

    public function create()
    {
        return view('subject_group.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_group_name' => 'required|min:4|max:255'
        ]);
        
        SubjectGroup::create([
            'subject_group_name' => $request->subject_group_name,
            'slug' => Str::slug($request->subject_group_name, '-')
        ]);

        return redirect('/kelompok_mata_pelajaran');
    }

    public function show($slug)
    {
        $subject_group= SubjectGroup::where('slug', $slug)->first();
        $subjects = Subject::where('subject_groups_id', $subject_group->id)->get();
        return view('subject_group.single', compact('subjects', 'subject_group'));
    }

    public function edit($id)
    {
        $subject_group = SubjectGroup::find($id);
        return view('subject_group.edit' , compact('subject_group'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
        'subject_group_name' => 'required|min:3|max:255'
        ]);

        SubjectGroup::find($id)->update([
            'subject_group_name' => $request->subject_group_name
        ]);
        
        return redirect('/kelompok_mata_pelajaran');
    }
    
    public function destroy($id)
    {
        SubjectGroup::find($id)->delete();
        return redirect('/kelompok_mata_pelajaran');
    }
}

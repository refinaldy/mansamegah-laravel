<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Support\Str;
use App\Models\SubjectGroup;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index(){
        $subjects= Subject::get();
        $subject_groups = SubjectGroup::get();
        return view('subject.index', compact('subjects', 'subject_groups'));
    }

    public function create(){
        $subject_groups = SubjectGroup::get();
        return view('subject.create', compact('subject_groups'));
    }

    public function store(Request $request){

        $subject_groups = SubjectGroup::where('subject_group_name', $request->subject_group_name)->first();

        $request->validate([
            'subject_name' => 'required|min:4|max:255'
        ]);
        
        Subject::create([
            'subject_name' => $request->subject_name,
            'subject_groups_id' => $subject_groups->id,
            'slug' => Str::slug($request->subject_name, '-')
        ]);

        return redirect('/mata_pelajaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $subject= Subject::where('slug', $slug)->first();
        return view('subject.single', compact('subject'));
    }

    public function edit($id)
    {
        $subject = Subject::find($id);
        $subject_group_name = SubjectGroup::find($subject->subject_groups_id)->subject_group_name;
        return view('subject.edit' , compact('subject', 'subject_group_name'));
    }

    public function update(Request $request, $id)
    {    
        $request->validate([
            'subject_name' => 'required|min:4|max:255'
        ]);

        $subject_group = SubjectGroup::where('subject_group_name', $request->subject_group_name)->first();

        Subject::find($id)->update([
            'subject_name' => $request->subject_name,
            'subject_groups_id' => $subject_group->id
        ]);

        return redirect('/mata_pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();
        return redirect('/mata_pelajaran');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index($temp){
        
        $academic_years = AcademicYear::orderBy('slug', 'desc')
                            ->get();
        return view('academic_year.index',compact('academic_years', 'temp'));
    }


    public function create()
    {
        return view('academic_year.create');
    }

    public function store(Request $request){

        $request->validate([
            'academic_year_start' => 'required|min:4|max:4',
            'academic_year_end' => 'required|min:4|max:4'
        ]);

        $academic_year = $request -> input('academic_year_start') . "/" . $request->input('academic_year_end');
        $slug = $request -> input('academic_year_start') . "-" . $request->input('academic_year_end');

        AcademicYear::create([
            'year' => $academic_year,
            'slug' => $slug
        ]);

        return redirect('/tahun_akademik');
    }


    public function edit($id)
    {
        $academic_year = AcademicYear::find($id);
        return view('academic_year.edit', compact('academic_year'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'academic_year_start' => 'required|min:4|max:4',
            'academic_year_end' => 'required|min:4|max:4'
        ]);
        
        $academic_year_start = $request -> input('academic_year_start');
        $academic_year_end = $request -> input('academic_year_end');
        $academic_year = $academic_year_start ."/" .$academic_year_end;

        AcademicYear::find($id)->update([
            'year' => $academic_year
        ]);

        return redirect('/tahun_akademik');
    }

    public function destroy($id){

        AcademicYear::find($id)->delete();

        return redirect('/tahun_akademik');
    }

}
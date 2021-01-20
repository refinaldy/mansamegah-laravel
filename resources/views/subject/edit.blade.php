@extends('layouts.app')

@section('content')
        
    <div class="container"> 
        <h2>Edit Mata Pelajaran</h2>
        <form action="/mata_pelajaran/{{$subject->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-2">
                <label for="subject_name">Mata Pelajaran</label>
                <input class="form-control" type="text" name="subject_name" id="subject_name" placeholder="{{ $subject->subject_name }}">  
            </div>

            <div class="form-group mb-4">
                <label for="subject_group_name">Kelompok Mata Pelajaran</label>
                <input class="form-control" type="text" name="subject_group_name" id="subject_group_name" value="{{$subject_group_name}}" readonly>  
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Edit Mata Pelajaran</button>
        
        </form>
    </div>

    

@endsection
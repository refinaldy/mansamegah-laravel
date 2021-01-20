@extends('layouts.app')

@section('content')
        
    <div class="container">
        <h2>Edit Kelompok Mata Pelajaran</h2>
        <form action="/kelompok_mata_pelajaran/{{$subject_group->id}}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="subject_group_name" placeholder="{{ $subject_group->subject_group_name}}"> 

            <button type="submit" class="btn btn-primary btn-sm">Edit Kelompok Mata Pelajaran</button>
        
        </form>
    </div>

    

@endsection
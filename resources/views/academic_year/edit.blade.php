@extends('layouts.app')

@section('content')
   
    @php
        $academic_year_explode = explode("/", $academic_year->year);
        $academic_year_start = $academic_year_explode[0];
        $academic_year_end = $academic_year_explode[1];
    @endphp 
        
    <div class="container">
        <h2>Edit Tahun Ajaran</h2>
        <form action="/tahun_akademik/{{$academic_year->id}}" method="POST">
            @csrf
            @method('PUT')

            <input type="number" name="academic_year_start" placeholder="{{ $academic_year_start}}"> 

            <input type="text" value="/" readonly disabled> 

            <input type="number" placeholder="{{ $academic_year_end}}" name="academic_year_end">

            <button type="submit" class="btn btn-primary btn-sm">Edit Tahun Ajaran</button>
        
        </form>
    </div>

    

@endsection
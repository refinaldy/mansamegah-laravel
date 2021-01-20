@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Buat Tahun Ajaran</h2>
        <form action="/tahun_akademik" method="POST">
            @csrf

            <input type="number" name="academic_year_start" placeholder="2018"> 

            <input type="text" value="/" readonly disabled> 

            <input type="number" placeholder="2019" name="academic_year_end">

            <button type="submit" class="btn btn-primary btn-sm">Tambah Tahun Ajaran</button>
        
        </form>
    </div>
@endsection
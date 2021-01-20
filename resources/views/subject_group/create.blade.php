@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Buat Tahun Ajaran</h2>
        <form action="/kelompok_mata_pelajaran" method="POST">
            @csrf

            <input type="text" name="subject_group_name" placeholder="Kelompok Wajib"> 

            <button type="submit" class="btn btn-primary btn-sm">Tambah Kelompok Mata Pelajaran</button>
        
        </form>
    </div>
@endsection
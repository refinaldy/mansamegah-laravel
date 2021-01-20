@extends('layouts.app')

@section('content')
    
	<div class="container">
        <h1>Mata Pelajaran {{ $subject->subject_name }}</h1>
        <form action="/mata_pelajaran/{{ $subject->id }}" method="POST">
            @csrf
            @method("DElETE")

            <button type="submit" class="btn btn-danger btn-sm">Hapus Mata Pelajaran</button>
        </form>
        
        {{-- form ini dimunculkan saat user melakukan klik tombol tambah tahun ajaran --}}
        <br>
        <table border="1" >
            <tr>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
            
        </table>
    </div> 

@endsection
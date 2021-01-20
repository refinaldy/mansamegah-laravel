@extends('layouts.app')

@section('content')

	<div class="container">
        <h1>Kelompok Mata Pelajaran</h1>
        {{-- form ini dimunculkan saat user melakukan klik tombol tambah tahun ajaran --}}
        
        <br>
        <table class="table">
            <tr class="table-row">
                <th>Kelompok Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
            
            @foreach($subject_groups as $subject_group)
                <tr class="table-row">
                    <td>{{ $subject_group->subject_group_name }}</td>
                    <td><a href="/kelompok_mata_pelajaran/{{ $subject_group->slug  }}">Detail</a> | <a href="/kelompok_mata_pelajaran/{{ $subject_group->id }}/edit">Edit</a> </td>
                </tr>
            @endforeach
            
        </table>
    </div> 

@endsection
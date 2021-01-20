@extends('layouts.app')

@section('content')

	<div class="container">
        <h1>Guru</h1>
        {{-- form ini dimunculkan saat user melakukan klik tombol tambah tahun ajaran --}}
        
        <br>
        <table class="table">
            <tr class="table-row">
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Aksi</th>
            </tr>
            
            @foreach($teachers as $teacher)
                <tr class="table-row">
                    <td>{{ $teacher->nip }}</td>
                    <td>{{ $teacher->full_name }}</td>
                    <td><a href="/guru/{{ $teacher->slug  }}">Detail</a> </td>
                </tr>
            @endforeach
            
        </table>
    </div> 

@endsection
@extends('layouts.app')

@section('content')

	<div class="container">
        <h1>Daftar Siswa Tahun Ajaran
            {{ $year->year }}
        </h1>
        
        <br>

        <a href="/siswa/create/{{ $year->id }}" class="btn btn-info btn-sm">Tambah Siswa Yang Diterima Pada Tahun {{ $year->year }}</a>

        <table class="table">
            <tr class="table-row">
                <th>Nama Siswa</th>
                <th>Aksi</th>
            </tr>
            
            @foreach ($students as $student)
            <tr>
                <td>
                    {{ $student->first_name . " " . $student->second_name }}
                </td>

                <td>
                    <a href="/siswa/{{ $student->slug }}" class="btn btn-primary btn-sm">Lihat Data Siswa</a>
                </td>

                <td>
                    <form action="/siswa/{{ $student->id }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">Hapus Siswa</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
            
        </table>
    </div> 

@endsection
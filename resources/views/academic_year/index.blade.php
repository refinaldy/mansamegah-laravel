@extends('layouts.app')

@section('content')

	<div class="container">
    
        @if($temp == 0)
            <h1>Daftar Tahun Ajaran</h1>
            
        @elseif($temp == 1)
            <h1>Pilih Tahun Ajaran Untuk Membuka Kelas</h1>
        @elseif($temp == 2)
            <h1>Pilih Tahun Ajaran Untuk Membuka Siswa</h1>
        @endif
    
        <br>
        <table class="table">
            <tr class="table-row">
                <th>Tahun Ajaran</th>
                <th>Aksi</th>
            </tr>
            
            @foreach($academic_years as $academic_year)
                <tr class="table-row">
                    <td>{{ $academic_year->year }}</td>
                    <td><a class="btn btn-info btn-sm" href="/kelas/tahun/{{ $academic_year->slug  }}">Lihat Daftar Kelas</a>  
                        <a class="btn btn-primary btn-sm" href="/tahun_akademik/{{ $academic_year->id }}/edit">Edit</a> 
                    
                            <a href="/siswa/tahun/{{ $academic_year->slug }}" class="btn btn-primary btn-sm">Lihat Daftar Siswa</a>
                        </td>
                    
                </tr>
            @endforeach
            
        </table>
    </div> 

@endsection
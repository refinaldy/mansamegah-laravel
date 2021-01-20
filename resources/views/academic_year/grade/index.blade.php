@extends('layouts.app')

@section('content')

	<div class="container">
        <h1>Daftar Kelas Tahun Ajaran  
            {{ $year->year }}
        </h1>
        
        <br>

        <a href="/kelas/{{$year->id}}/create" class="btn btn-info btn-sm">Tambah Kelas</a>

        <table class="table">
            <tr class="table-row">
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
            
            @foreach($grades as $grade)
                <tr class="table-row">
                    <td>{{ $grade->grade_name }}</td>
                    @foreach ($teachers as $teacher)
                        @foreach ($teacher->grades as $gradeteacher)
                            @if($grade->id == $gradeteacher->id)
                                <td>{{ $teacher->full_name }}</td>
                            @endif
                        @endforeach
                    @endforeach
                    <td>
                        <div class="d-flex justify-content-lg-around">
                            <a href="/kelas/{{ $grade->slug  }}" class="btn btn-primary btn-sm">Detail</a> 
                            <a href="/kelas/{{ $grade->id  }}/edit" class="btn btn-info btn-sm">Edit</a> 
                            
                            <form action="/kelas/{{ $grade->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach


            
        </table>
    </div> 

@endsection
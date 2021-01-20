@extends('layouts.app')

@section('content')
    
    <div class="container p-2">
        <h2>Edit</h2>
        <form action="/kelas/{{ $grade_id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div hidden>
                <input type="text" name="year_id" value="{{ $year_id }}">
            </div>

            <div class="form-group">
                <label for="name">Nama Guru</label>
                <input hidden class="form-control" id="name" name="teacher_id" value="{{ $teacher->id }}">
                <input readonly class="form-control" id="name" name="teacher_name" value="{{ $teacher->full_name }}">
            </div>

            <div class="mt-4">
                <h6>Edit Kelas yang diwalikan</h6>
            </div>

            <div class="form-group">
                <label>Tahun Ajaran</label>
                <input class="form-control" readonly type="text" value="{{ $year_selected }}">
            </div>

            <div class="form-group">
                <label for="grade">Edit Tingkatan</label>
                <select class="form-control" id="grade" name="grade">
                    <option>Pilih</option>
                    @foreach ($grades as $grade)
                        @if($grade == $grade_selected)
                            <option selected value="{{ $grade }}">{{ $grade }}</option>
                        @else
                            <option value="{{ $grade }}">{{ $grade }}</option>
                        @endif
                        
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="major">Edit Jurusan</label>
                <select class="form-control" id="major" name="major">
                    <option>Pilih</option>
                    @foreach ($majors as $major)
                        @if($major == $major_selected)
                            <option selected value="{{ $major }}">{{ $major }}</option>
                        @else
                            <option value="{{ $major }}">{{ $major }}</option>
                        @endif
                        
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grade_name">Edit Nama Kelas</label>
                <input class="form-control" type="text" name="grade_name" id="grade_name" value="{{ $grade_name }}">
            </div>
            <br>
            
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary btn-sm">Edit Kelas Yang Diwalikan</button>
            </div>
            
        </form>
    </div>

@endsection
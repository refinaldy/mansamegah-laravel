@extends('layouts.app')

@section('content')
    
    <div class="container p-2">
        <h2>Buat Kelas Pada Tahun Ajaran {{ $year->year }}</h2>
        <form action="/kelas" method="POST" enctype="multipart/form-data">
            @csrf

            <div hidden>
                <input type="number" value="{{ $year->id }}" name="year_id">
            </div>

            <div class="form-group">
                <label for="name">Pilih Guru</label>
                <select class="form-control" id="name" name="teacher_nip">
                    <option>Pilih</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher['nip'] }}">{{ $teacher['full_name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grade">Pilih Tingkatan</label>
                <select class="form-control" id="grade" name="grade">
                    <option>Pilih</option>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade }}">{{ $grade }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="major">Pilih Jurusan</label>
                <select class="form-control" id="major" name="major">
                    <option>Pilih</option>
                    @foreach ($majors as $major)
                        <option value="{{ $major }}">{{ $major }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grade_name">Nama Kelas</label>
                <input class="form-control" type="text" name="grade_name" id="grade_name" placeholder="Contoh : 1">
            </div>
            <br>
            
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-primary btn-sm">Tambah Kelas Baru</button>
            </div>
            
        </form>
    </div>

@endsection
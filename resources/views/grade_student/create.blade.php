@extends('layouts.app')

@section('content')
    <div class="container">
        
        <h2>Buat Tahun Ajaran</h2>
        <form action="/guru_mata_pelajaran" method="POST">
            @csrf   

            @if($from_nav)
                <div class="form-group">
                    <label for="teacher">Pilih Guru</label>
                    <select class="form-control" id="teacher" name="nip">
                        <option>Pilih</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->nip }}">{{ $teacher->full_name }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <div class="form-group">
                    <label for="teacher_nip">Nomor Induk</label>
                    <input class="form-control" type="number" name="nip" id="teacher_nip" value="{{ $teacher->nip }}" readonly>
                </div>

                <div class="form-group">
                    <label for="teacher_name">Nama</label>
                    <input class="form-control" type="text" name="name" id="teacher_name" value="{{ $teacher->full_name }}" readonly>
                </div>
            @endif
            <div class="form-group">
                <label for="subject_teacher">Guru Mata Pelajaran</label>
                <select class="form-control" id="subject_teacher" name="subject_teacher">
                    <option>Pilih</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-4">Tambah Mata Pelajaran</button>
        </form>
    </div>
@endsection
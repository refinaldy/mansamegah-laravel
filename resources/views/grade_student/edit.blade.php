@extends('layouts.app')

@section('content')
    <div class="container">
        
        <h2>Ubah Data Guru Mengajar</h2>
        <form action="/guru_mata_pelajaran/{{$subject_teacher }}" method="POST">
            @csrf   
            @method('PUT')

            <div hidden>
                <input type="number" name="old_id" value="{{ $subject_teacher }}">
                <input type="number" name="old_subject" value="{{ $subject_id }}">
            </div>

            <div class="form-group">
                <label for="teacher_nip">Nomor Induk</label>
                <input class="form-control" type="number" name="nip" id="teacher_nip" value="{{ $teacher->nip }}" readonly>
            </div>

            <div class="form-group">
                <label for="teacher_name">Nama</label>
                <input class="form-control" type="text" name="name" id="teacher_name" value="{{ $teacher->full_name }}" readonly>
            </div>

            <div class="form-group">
                <label for="subject_teacher">Guru Mata Pelajaran</label>
                <select class="form-control" id="subject_teacher" name="subject_teacher">
                    <option>Pilih</option>
                    @foreach ($subjects as $subject)
                        @if($subject->id == $subject_id)
                            <option selected value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                        @else
                            <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-4">Ubah Data Guru</button>
        </form>
    </div>
@endsection
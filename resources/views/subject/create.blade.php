@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Mata Pelajaran</h2>

        <form action="/mata_pelajaran" method="POST">
            @csrf

            <div class="form-group">
                <label for="subject_name">Mata Pelajaran</label>
                <input class="form-control" type="text" name="subject_name" id="subject_name" placeholder="Contoh : Agama Islam">  
            </div>

            <div class="form-group mt-4 mb-4">
                <label for="subject_group_name">Pilih Kelompok Mata Pelajaran </label>
                <select class="form-control" id="subject_group_name" name="subject_group_name">
                    <option value="0">Pilih</option>
                    @foreach ($subject_groups as $subject_group)
                        <option>{{ $subject_group->subject_group_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Tambah Mata Pelajaran</button>
        
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Buat Tahun Ajaran</h2>
        <form action="/guru/{{ $teacher->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nip">Nomor Induk</label>
                <input class="form-control" type="number" name="nip" id="nip" value="{{ $teacher->nip }}">  
            </div>

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $teacher->full_name }}">  
            </div>

            <div class="form-group">
                <label for="phone_number">Nomor Telepon</label>
                <input class="form-control" type="number" name="phone_number" id="phone_number" value="{{ $teacher->phone_number}}">  
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <input class="form-control" type="text" name="address" id="address" value="{{ $teacher->address }}">  
            </div>

            <div class="form-group">
                <label for="education">Pendidikan</label>
                <input class="form-control" type="text" name="education" id="education" value=" {{ $teacher->education}}">  
            </div>

            <div class="form-group">
                <label for="position">Pilih Posisi</label>
                <select class="form-control" id="position" name="position">
                    <option>Pilih</option>
                    @foreach ($positions as $position)
                        @if($position === $teacher->position)
                        <option value="{{ $position }}" selected>{{ $position }}</option>
                        @else
                        <option value="{{ $position }}">{{ $position }}</option>
                        @endif    
                    @endforeach
                </select>
            </div>

            
            <div class="form-group form-control mt-2">
                <label>Jenis Kelamin :</label>
                @if($teacher->gender == "Laki-laki")
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="man" value="Laki-laki" checked>
                        <label class="form-check-label" for="man">
                        Laki-Laki
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="woman" value="Perempuan">
                        <label class="form-check-label" for="woman">
                        Perempuan
                        </label>
                    </div>
                @else
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="woman" value="Perempuan" checked>
                        <label class="form-check-label" for="woman">
                        Perempuan
                        </label>
                    </div>

                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="man" value="Laki-laki">
                        <label class="form-check-label" for="man">
                        Laki-Laki
                        </label>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="birth_place">Tempat Lahir</label>
                <input class="form-control" type="text" name="birth_place" id="birth_place" value="{{ $teacher->birth_place }}">  
            </div>

            <div class="form-group">
                <label for="date">Tanggal Lahir</label>
                <input type="date" name="birth_date" id="date" class="form-control" value="{{ $teacher->birth_date }}">
            </div>

            @if($teacher->teacher_image)
            <img src="/image/{{$teacher->teacher_image }}" 
                class="rounded float-left" width=" 20%";
                alt="foto-profil-{{ $teacher->full_name }}">
                <div class="form-group mt-2">
                    <label for="photo">Ganti Foto</label> <br>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
            @else 
                <p>Anda belum menambahkan foto profil</p>
                <div class="form-group mt-2">
                    <label for="photo">Unggah Foto</label> <br>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
            @endif
            
            <button type="submit" class="btn btn-primary btn-sm mt-4">Ubah Data Guru</button>
        
        </form>
    </div>
@endsection
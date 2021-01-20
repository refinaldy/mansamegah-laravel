@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Buat Tahun Ajaran</h2>
        <form action="/guru" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nip">Nomor Induk</label>
                <input class="form-control" type="number" name="nip" id="nip" placeholder="Contoh : 1800018411">  
            </div>

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Contoh : S1 Pendidikan Matematika">  
            </div>

            <div class="form-group">
                <label for="phone_number">Nomor Telepon</label>
                <input class="form-control" type="number" name="phone_number" id="phone_number" placeholder="Contoh : 081234567890">  
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <input class="form-control" type="text" name="address" id="address" placeholder="Contoh : 081234567890">  
            </div>

            <div class="form-group">
                <label for="education">Pendidikan</label>
                <input class="form-control" type="text" name="education" id="education" placeholder="Contoh : Refinaldy Madras">  
            </div>

            <div class="form-group">
                <label for="position">Pilih Posisi</label>
                <select class="form-control" id="position" name="position">
                    <option>Pilih</option>
                    @foreach ($positions as $position)
                        <option value="{{ $position }}">{{ $position }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group form-control mt-2">
                <label>Jenis Kelamin :</label>
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
            </div>

            <div class="form-group">
                <label for="birth_place">Tempat Lahir</label>
                <input class="form-control" type="text" name="birth_place" id="birth_place" placeholder="Contoh : Tarakan">  
            </div>

            <div class="form-group">
                <label for="date">Tanggal Lahir</label>
                <input type="date" name="birth_date" id="date" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="photo">Upload Photo</label> <br>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            
            <button type="submit" class="btn btn-primary btn-sm mt-4">Tambah Guru</button>
        
        </form>
    </div>
@endsection
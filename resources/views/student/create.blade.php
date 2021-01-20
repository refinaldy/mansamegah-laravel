@extends('layouts.app')

@section('content')
    
    <div class="container p-2">
        <h2>Buat Kelas Pada Tahun Ajaran </h2>
        <form action="/siswa" method="POST" enctype="multipart/form-data">
            @csrf
                {{--Add label to all the form that's not having a label --}}
                <div class="form-group mt-4">
                    <h6>Data Sekolah Siswa</h6>

                    <input name="nis" type="text" class="form-control mb-2" placeholder="NIS">
                    <input name="nisn" type="text" class="form-control mb-2" placeholder="NISN">
                    <input name="full_name" type="text" class="form-control mb-2" placeholder="Nama Lengkap">
                    
                    <select name="gender" class="form-control mb-2">
                        <option disabled selected>Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>

                    
                    <label for="grade">Diterima pada tingkat kelas</label>
                    <select id="grade" name="grade_accepted" class="form-control mb-2">
                        <option value="" disabled selected>Pilih Tingkat Kelas saat diterima</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade }}">{{ $grade }}</option>
                        @endforeach
                    </select>

                    <label for="academic_year">Diterima pada tahun ajaran</label>
                    <select id="academic_year" name="year_accepted" class="form-control mb-2">
                        <option value="" disabled selected>Pilih Tahun Diterima</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}">{{ $year->year }}</option>
                        @endforeach
                    </select>

                    <label for="origin_school">Asal Sekolah</label>
                    <input type="text" id="origin_school" name="origin_school" class="form-control mb-2" placeholder="Asal Sekolah">
                
                </div>
                
                <div class="form-group mt-5">
                    <h6>Data Pribadi Siswa</h6>
                    <p>Note : Data pribadi dapat diisikan manual oleh siswa</p>
                    
                    <input name="birth_place" type="text" class="form-control mb-2" placeholder="Tempat Lahir">
                    <input name="birth_date" type="date" class="form-control mb-2" placeholder="Tanggal Lahir">
                    
                    <input name="address" type="text" class="form-control mb-2" placeholder="Alamat">
                
                </div>

                <div class="form-group mt-5">
                    <h6> Data Orang Tua</h6>
                    <p>Note : Data orang tua dapat diisikan manual oleh siswa</p>
                    <div class="form-group">
                        <label for="fathers_name">Nama Ayah</label>
                        <input id="fathers_name" name="fathers_name" type="text" class="form-control mb-2" placeholder="Nama Ayah">
                    </div>
                    
                    <div class="form-group">
                        <label for="fathers_job">Pekerjaan Ayah</label>
                        <input id="fathers_job" name="fathers_job" type="text" class="form-control mb-2" placeholder="Pekerjaan Ayah">
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="fathers_phone">Nomor Ayah</label>
                        <input id="fathers_phone" name="fathers_phone" type="text" class="form-control mb-2" placeholder="Nomor Telepon Ayah">
                    </div>
                    
                    <input name="fathers_address" type="text" class="form-control mb-2" placeholder="Alamat Ayah">
                    
                    <input name="mothers_name" type="text" class="form-control mb-2" placeholder="Nama Ibu">
                    
                    <input name="mothers_job" type="text" class="form-control mb-2" placeholder="Perkerjaan Ibu">
                    
                    <input name="mothers_phone" type="text" class="form-control mb-2" placeholder="Nomor Telepon Ibu">
                    
                    <input name="mothers_address" type="text" class="form-control mb-2" placeholder="Alamat Ibu">
                </div>

                <div class="form-group mt-5">
                    <h6>Data Wali</h6>
                    <p>Note : Data wali dapat diisikan manual oleh siswa</p>
                    <input type="text" class="form-control mb-2" placeholder="Nama Wali">
                    <input type="text" class="form-control mb-2" placeholder="Perkerjaan Wali">
                    <input type="text" class="form-control mb-2" placeholder="Nomor Telepon Wali">
                    <input type="text" class="form-control mb-2" placeholder="Alamat Wali">
                </div>

                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
        
        </form>
    </div>

@endsection
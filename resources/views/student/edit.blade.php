@extends('layouts.app')

@section('content')
    
    <div class="container p-2">
        <h2>Edit Data Siswa</h2>
        <form action="/siswa/{{ $student->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{--Add label to all the form that's not having a label --}}
            <div class="form-group mt-4">
                <h6>Data Sekolah Siswa</h6>

                <input name="nis" type="text" class="form-control mb-2" value="{{ $student->nis }}">
                <input name="nisn" type="text" class="form-control mb-2" value="{{ $student->nisn }}">
                <input name="full_name" type="text" class="form-control mb-2" value="{{ $student->first_name . " " . $student->second_name  }}">
                
                <select name="gender" class="form-control mb-2">
                    <option disabled selected>Jenis Kelamin</option>
                    
                    @if($student->gender == 'L')
                        <option selected value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    @else 
                        <option value="L">Laki-laki</option>
                        <option selected value="P">Perempuan</option>
                    @endif
                    
                </select>

                
                <label for="grade">Diterima pada tingkat kelas</label>
                <select id="grade" name="grade_accepted" class="form-control mb-2">
                    <option value="" disabled selected>Pilih Tingkat Kelas saat diterima</option>
                    @foreach ($grades as $grade)
                        @if($student->accepted_to_class == $grade)
                            <option selected value="{{ $grade }}">{{ $grade }}</option>
                        @else 
                            <option value="{{ $grade }}">{{ $grade }}</option>
                        @endif
                    @endforeach
                </select>

                <label for="academic_year">Diterima pada tahun ajaran</label>
                <select id="academic_year" name="year_accepted" class="form-control mb-2">
                    <option value="" disabled selected>Pilih Tahun Diterima</option>
                    @foreach ($years as $year)
                        @if($year_accepted_selected == $year->id)
                            <option selected value="{{ $year->id }}">{{ $year->year }}</option>
                        @else
                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                        @endif
                    @endforeach
                </select>

                <label for="origin_school">Asal Sekolah</label>
                <input type="text" id="origin_school" name="origin_school" class="form-control mb-2" value="{{ $student->origin_school }}">
            
            </div>
            
            <div class="form-group mt-5">
                <h6>Data Pribadi Siswa</h6>
                <p>Note : Data pribadi dapat diisikan manual oleh siswa</p>
                
                <input name="birth_place" type="text" class="form-control mb-2" value="{{ $student->birth_place }}">
                <input name="birth_date" type="date" class="form-control mb-2" value="{{ $student->birth_date }}">
                
                <input name="address" type="text" class="form-control mb-2" value="{{ $student->address }}">
                
            </div>

            <div class="form-group mt-5">
                <h6> Data Orang Tua</h6>
                <p>Note : Data orang tua dapat diisikan manual oleh siswa</p>
                <div class="form-group">
                    <label for="fathers_name">Nama Ayah</label>
                    <input id="fathers_name" name="fathers_name" type="text" class="form-control mb-2" value="{{ $student->fathers_name }}">
                </div>
                
                <div class="form-group">
                    <label for="fathers_job">Pekerjaan Ayah</label>
                    <input id="fathers_job" name="fathers_job" type="text" class="form-control mb-2" value="{{ $student->fathers_job }}">
                </div>
                
                
                <div class="form-group">
                    <label for="fathers_phone">Nomor Ayah</label>
                    <input id="fathers_phone" name="fathers_phone" type="number" class="form-control mb-2" value="{{ $student->fathers_phone_number }}">
                </div>
                
                <input name="fathers_address" type="text" class="form-control mb-2" value="{{ $student->fathers_address }}">
                
                <input name="mothers_name" type="text" class="form-control mb-2" value="{{ $student->mothers_name }}">
                
                <input name="mothers_job" type="text" class="form-control mb-2" value="{{ $student->mothers_job }}">
                
                <input name="mothers_phone" type="text" class="form-control mb-2" value="{{ $student->mothers_phone_number }}">
                
                <input name="mothers_address" type="text" class="form-control mb-2" value="{{ $student->mothers_address }}">
            </div>

            <div class="form-group mt-5">
                <h6>Data Wali</h6>
                <p>Note : Data wali dapat diisikan manual oleh siswa</p>
                <input type="text" class="form-control mb-2" value="{{ $student->caregivers_name }}">
                <input type="text" class="form-control mb-2" value="{{ $student->caregivers_job }}">
                <input type="text" class="form-control mb-2" value="{{ $student->caregivers_phone_number }}">
                <input type="text" class="form-control mb-2" value="{{ $student->caregivers_address }}">
            </div>

            
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            
        </form>
    </div>

@endsection
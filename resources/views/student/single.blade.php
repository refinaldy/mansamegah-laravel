@extends('layouts.app')

@section('content')

	<div class="container">
        <h1>Profil {{ $student->first_name  . "-" . $student->nisn }}
        </h1>

        <div class="d-flex flex-row">
            <a href="/siswa/{{ $student->id }}/edit" class="btn btn-outline-primary btn-sm flex-column-reverse">Edit Data</a>
        </div>
        <br>
        @if($student->student_image)
            <img src="/image/{{$teacher->student_image }}" 
                class="rounded float-left" width=" 50%";
                alt="foto-profil-{{ $student->nisn }}">
        @else
            <img src="/image/nama-foto-default.png/jpg" 
            class="rounded float-left" width=" 50%";
            alt="foto-profil-default-siswa">
        @endif

        <table class="table">
            <tr class="table-row">
                <td>
                    Nama
                </td>

                <td>
                    :
                </td>
    
                <td>
                    {{ $student->first_name . " " . $student->second_name }}
                </td>
            </tr>

            <tr class="table-row">
                <td>

                </td>

                <td>
                    :
                </td>

                <td>
                    {{ $student->nis }}
                </td>
            </tr>

            <tr class="table-row">
                <td>

                </td>

                <td>
                    :
                </td>

                <td>
                    {{ $student->nisn }}
                </td>
            </tr>

            <tr class="table-row">
                <td>
                    Daftar Kelas Yang Diikuti
                </td>

                <td>
                    :
                </td>

                <td>
                    @foreach ($student->grades as $grade)
                        <li>
                            {{ $grade->grade_name }}
                        </li>
                    @endforeach
                </td>
            </tr>

            {{-- Lanjutkan  --}}
            
        </table>
    </div> 

@endsection
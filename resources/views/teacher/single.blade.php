@extends('layouts.app')

@section('content')
    
	<div class="container">
    
        <br>
        <div class="container">
            <h4>Halaman Detail guru</h4>

            <form action="/guru/{{ $teacher->id }}" method="POST">
                @csrf
                @method("DElETE")
    
                <button type="submit" class="btn btn-danger btn-sm">Hapus Data {{ $teacher->full_name }}</button>
            </form>
        </div>
        <div class="d-flex p-2 flex-row justify-content-between">
            
            @if($teacher->teacher_image)
            <img src="/image/{{$teacher->teacher_image }}" 
                class="rounded float-left" width=" 50%";
                alt="foto-profil-{{ $teacher->full_name }}">
            @else 
                {{-- Letakkan default photo disini --}}
                <img src="/image/default-photo-name" 
                alt="default-photo" class="rounded float-left" width="50%">
            @endif

            <table class="table ml-4 flex-row table-bordered">
                <tr>
                    <td>
                        Nama
                    </td>
                    <td>
                        {{ $teacher->full_name }}
                    </td>
                </tr>
                
                <tr>
                    <td>
                        NIP
                    </td>
                    <td>
                        {{ $teacher->nip }}
                    </td>
                </tr>
                    
                <tr>
                    <td>
                        Kontak
                    </td>
                    <td>
                        {{ $teacher->phone_number }}
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Pendidikan
                    </td>
                    <td>
                        {{ $teacher->education }}
                    </td>
                </tr>

                <tr>
                    <td>
                        ALamat
                    </td>
                    <td>
                        {{ $teacher->address }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Posisi
                    </td>
                    <td>
                        {{ $teacher->position }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Tempat Lahir
                    </td>
                    <td>
                        {{ $teacher->birth_place }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Tanggal Lahir
                    </td>
                    <td>
                        {{ $teacher->birth_date }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Guru Mata Pelajaran
                    </td>
                    <td>
                        <table>
                            @foreach ($teacher->subjects as $subject)
                                
                                    <tr>
                                        <td>
                                            {{ $subject->subject_name }}
                                        </td>
                                        <td>   
                                            <form action="/guru_mata_pelajaran/{{ $teacher->id }}/{{ $subject->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="/guru_mata_pelajaran/{{ $subject->id }}/{{ $teacher->id }}/edit">Edit</a>
                                        </td>
                                    </tr>
                                
                            @endforeach
                        </table>
                    </td>
                </tr>
                        
            </table>
            
        </div>
        <div class="d-flex flex-row-reverse">
            <a href="/guru/{{ $teacher->id }}/edit" class="btn btn-info btn-sm m-2">Edit Data Guru</a>
            @php
                $from_nav = 0
            @endphp
            <a href="/guru_mata_pelajaran/create/{{ $teacher->id }}/{{ $from_nav }}" class="btn btn-primary btn-sm m-2">Tambah Mata Pelajaran Guru</a>
        </div>

        
    </div> 

@endsection
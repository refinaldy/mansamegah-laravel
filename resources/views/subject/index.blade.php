@extends('layouts.app')

@section('content')

	<div class="container">
        <h1>Mata Pelajaran</h1>
        {{-- form ini dimunculkan saat user melakukan klik tombol tambah tahun ajaran --}}
        
        <br>

        @foreach ($subject_groups as $subject_group)

            <table class="table">
                <tr class="table-row">
                    <th>{{ $subject_group->subject_group_name }}</th>
                    <th>aksi</th>
                </tr>
                
                @foreach($subjects as $subject)
                    
                        @if($subject->subject_groups_id == $subject_group->id)
                            <tr class="table-row">
                                <td>{{ $subject->subject_name }}</td>
                                <td><a href="/mata_pelajaran/{{ $subject->slug  }}">Detail</a> | <a href="/mata_pelajaran/{{ $subject->id }}/edit">Edit</a> </td>
                            </tr> 
                        @endif
                @endforeach
            </table>
            
        @endforeach
    </div> 
@endsection
@extends('layouts.app')

@section('content')

	<div class="container p-3">
        <h5>{{ $subject_group->subject_group_name }}</h5>
        <form action="/kelompok_mata_pelajaran/{{ $subject_group->id }}" method="POST">
            @csrf
            @method("DElETE")

            <button type="submit" class="btn btn-danger btn-sm">Hapus {{ $subject_group->subject_group_name }}</button>
        </form>
        
        <br>
        <table border="1" > 
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($subjects as $subject)
                <tr>
                    <td>
                        {{ $no }}
                        @php
                            $no = $no + 1;
                        @endphp
                    </td>
                    <td>{{ $subject->subject_name }}</td>
                </tr>
            @endforeach
            
        </table>

    </div> 

@endsection
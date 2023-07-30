@extends('layouts.app')

@section('content')
<a href="{{ route('teacher-classrooms.create') }}">create</a>
    <table border="1">
        <thead>
            <th>teachers</th>
            <th>classrooms</th>
            <th>action</th>
        </thead>
        <tbody>
            @forelse ($teacher_classrooms as $tc)
                <tr>
                    <td>{{ $tc->teacher->name }}</td>
                    <td>{{ $tc->classroom->name }}</td>
                    <td>
                        <a href="{{ route('classrooms.edit', $tc->id) }}">edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%">no data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

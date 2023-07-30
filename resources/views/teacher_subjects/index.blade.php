@extends('layouts.app')

@section('content')
<a href="{{ route('teacher-subjects.create') }}">create</a>
    <table border="1">
        <thead>
            <th>teachers</th>
            <th>subjects</th>
            <th>action</th>
        </thead>
        <tbody>
            @forelse ($teacher_subjects as $ts)
                <tr>
                    <td>{{ $ts->teacher->name }}</td>
                    <td>{{ $ts->subject->name }}</td>
                    <td>
                        <a href="{{ route('classrooms.edit', $ts->id) }}">edit</a>
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

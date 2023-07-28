@extends('layouts.app')

@section('content')
<a href="{{ route('classroom-subjects.create') }}">create</a>
    <table border="1">
        <thead>
            <th>classroom</th>
            <th>subjects</th>
            <th>action</th>
        </thead>
        <tbody>
            @forelse ($classroom_subjects as $cs)
                <tr>
                    <td>{{ $cs->classroom->name }}</td>
                    <td>{{ $cs->subject->name }}</td>
                    <td>
                        <a href="{{ route('classrooms.edit', $cs->id) }}">edit</a>
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

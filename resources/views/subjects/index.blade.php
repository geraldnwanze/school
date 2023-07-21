@extends('layouts.app')

@section('content')
<a href="{{ route('subjects.create') }}">create</a>
    <table border="1">
        <thead>
            <th>name</th>
            <th>status</th>
            <th>action</th>
        </thead>
        <tbody>
            @forelse ($subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->status }}</td>
                    <td>
                        <a href="{{ route('subjects.edit', $subject->id) }}">edit</a>
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

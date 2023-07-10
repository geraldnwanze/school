@extends('layouts.app')

@section('content')
<a href="{{ route('classrooms.create') }}">create</a>
    <table border="1">
        <thead>
            <th>name</th>
            <th>action</th>
        </thead>
        <tbody>
            @forelse ($classrooms as $classroom)
                <tr>
                    <td>{{ $classroom->name }}</td>
                    <td>
                        <a href="{{ route('classrooms.edit', $classroom->id) }}">edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100%"></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@extends('layouts.app')

@section('content')
<a href="{{ route('students.create', 1) }}">create</a>
    <table border="1">
        <thead>
            <th>reg no</th>
            <th>full name</th>
            <th>class</th>
            <th>status</th>
            <th>action</th>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->reg_no }}</td>
                    <td>{{ $student->profile->fullname }}</td>
                    <td>{{ $student->profile->classroom->name }}</td>
                    <td>{{ $student->status }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}">view</a>
                        <a href="{{ route('students.edit', $student->id) }}">edit</a>

                        @if ($student->active)
                            <button form="deactivate-{{ $student->id }}">deactivate</button>
                        @else
                            <button form="activate-{{ $student->id }}">activate</button>
                        @endif
                    </td>
                    <form action="{{ route('students.deactivate', $student->id) }}" method="post" id="deactivate-{{ $student->id }}">
                        @csrf
                        @method('PATCH')
                    </form>

                    <form action="{{ route('students.activate', $student->id) }}" method="post" id="activate-{{ $student->id }}">
                        @csrf
                        @method('PATCH')
                    </form>
                </tr>
            @empty
                <tr>
                    <td colspan="100%"></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

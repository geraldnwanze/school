@extends('layouts.app')

@section('content')
<a href="{{ route('teachers.create') }}">create</a>
    <table border="1">
        <thead>
            <th>name</th>
            <th>phone</th>
            <th>address</th>
            <th>passport</th>
            <th>marital status</th>
            <th>date of employment</th>
            <th>status</th>
            <th>action</th>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>
                        <img src="{{ asset($teacher->passport) }}" alt="" width="200">
                    </td>
                    <td>{{ $teacher->marital_status }}</td>
                    <td>{{ $teacher->date_of_employment }}</td>
                    <td>{{ $teacher->status }}</td>
                    <td>
                        <a href="{{ route('teachers.edit', $teacher->id) }}">edit</a>
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

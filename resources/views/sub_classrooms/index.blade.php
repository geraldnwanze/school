@extends('layouts.app')

@section('content')
<a href="{{ route('sub-classrooms.create') }}">create</a>
    <table border="1">
        <thead>
            <th>classroom</th>
            <th>sub classrooms</th>
            <th>action</th>
        </thead>
        <tbody>
            @forelse ($sub_classrooms as $classroom)
                <tr>
                    <td>{{ $classroom->classroom->name }}</td>
                    <td>{{ $classroom->name }}</td>
                    <td>
                        <a href="{{ route('sub-classrooms.edit', $classroom->id) }}">edit</a>
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

@extends('layouts.app')

@section('content')
<a href="{{ route('staffs.create') }}">create</a>
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
            @forelse ($staffs as $staff)
                <tr>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>{{ $staff->address }}</td>
                    <td>
                        <img src="{{ asset($staff->passport) }}" alt="" width="200" height="200">
                    </td>
                    <td>{{ $staff->marital_status }}</td>
                    <td>{{ $staff->date_of_employment }}</td>
                    <td>{{ $staff->status }}</td>
                    <td>
                        <a href="{{ route('staffs.edit', $staff->id) }}">edit</a>
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

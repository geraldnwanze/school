@extends('layouts.app')

@section('content')
<a href="{{ route('students.profile.create', 1) }}">create</a>
    <table border="1">
        <thead>
            <th>reg no</th>
            <th>last name</th>
            <th>first name</th>
            <th>other names</th>
            <th>gender</th>
            <th>dob</th>
            <th>age</th>
            <th>father's name</th>
            <th>father's phone</th>
            <th>mother's name</th>
            <th>mother's name</th>
            <th>guardian's name</th>
            <th>guardian's phone</th>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $student->reg_no }}</td>
                    <td>{{ $student->profile->last_name }}</td>
                    <td>{{ $student->profile->first_name }}</td>
                    <td>{{ $student->profile->other_names }}</td>
                    <td>{{ $student->profile->gender }}</td>
                    <td>{{ $student->profile->dob }}</td>
                    <td>{{ $student->profile->age }}</td>
                    <th>{{ $student->profile->fathers_name }}</th>
                    <th>{{ $student->profile->fathers_phone }}</th>
                    <th>{{ $student->profile->mothers_name }}</th>
                    <th>{{ $student->profile->mothers_phone }}</th>
                    <th>{{ $student->profile->guardians_name }}</th>
                    <th>{{ $student->profile->guardians_phone }}</th>
                </tr>
        </tbody>
    </table>
@endsection

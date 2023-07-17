@extends('layouts.app')

@section('content')
    <form action="{{ route('students.profile.update', $student->profile->id) }}" method="post">
        @csrf
        @method('PATCH')
        <select name="classroom_id" id="">
            <option value="{{ $student->profile->classroom_id }}">{{ $student->profile->classroom->name }}</option>
            @foreach ($classrooms as $classroom)
                @if (($student->profile->classroom_id != $classroom->id))
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endif
            @endforeach
        </select>
        <input type="text" name="last_name" placeholder="last name" value="{{ $student->profile->last_name }}">
        <input type="text" name="first_name" placeholder="first name" value="{{ $student->profile->first_name }}">
        <input type="text" name="other_names" placeholder="other names" value="{{ $student->profile->other_names }}">
        <select name="gender" id="">
            @foreach ($genders as $gender)
                @if ($student->gender != $gender)
                 <option value="{{ $gender }}">{{ $gender }}</option>
                @endif
            @endforeach
        </select>
        <input type="date" name="dob" placeholder="date of birth" value="{{ $student->profile->dob }}">
        <textarea name="residential_address" placeholder="residential address" cols="30" rows="10">{{ $student->profile->residential_address }}</textarea>
        <textarea name="permanent_address" placeholder="residential address" cols="30" rows="10">{{ $student->profile->permanent_address }}</textarea>
        <input type="text" name="fathers_name" placeholder="father's name" value="{{ $student->profile->fathers_name }}">
        <input type="text" name="fathers_phone" placeholder="father's phone" value="{{ $student->profile->fathers_phone }}">
        <input type="text" name="mothers_name" placeholder="mother's name" value="{{ $student->profile->mothers_name }}">
        <input type="text" name="mothers_phone" placeholder="mother's phone" value="{{ $student->profile->mothers_phone }}">
        <input type="text" name="guardians_name" placeholder="guardian's name" value="{{ $student->profile->guardians_name }}">
        <input type="text" name="guardians_phone" placeholder="guardian's phone" value="{{ $student->profile->guardians_phone }}">
        <button>submit</button>
    </form>
@endsection

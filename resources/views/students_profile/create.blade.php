@extends('layouts.app')

@section('content')
    <form action="{{ route('students.profile.store') }}" method="post">
        @csrf
        <input type="hidden" name="classroom_id" value="{{ $class->id }}">
        <input type="text" name="last_name" placeholder="last name">
        <input type="text" name="first_name" placeholder="first name">
        <input type="text" name="other_names" placeholder="other names">
        <select name="gender" id="">
            @foreach ($genders as $gender)
                <option value="{{ $gender }}">{{ $gender }}</option>
            @endforeach
        </select>
        <input type="date" name="dob" placeholder="date of birth">
        <textarea name="residential_address" placeholder="residential address" cols="30" rows="10"></textarea>
        <textarea name="permanent_address" placeholder="residential address" cols="30" rows="10"></textarea>
        <input type="text" name="fathers_name" placeholder="father's name">
        <input type="text" name="fathers_phone" placeholder="father's phone">
        <input type="text" name="mothers_name" placeholder="mother's name">
        <input type="text" name="mothers_phone" placeholder="mother's phone">
        <input type="text" name="guardians_name" placeholder="guardian's name">
        <input type="text" name="guardians_phone" placeholder="guardian's phone">
        <button>submit</button>
    </form>
@endsection

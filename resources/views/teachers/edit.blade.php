@extends('layouts.app')

@section('content')
    <form action="{{ route('teachers.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <input type="text" name="name" placeholder="name" value="{{ $teacher->name }}">
        <input type="text" name="phone" placeholder="phone" value="{{ $teacher->phone }}">
        <img src="{{ asset($teacher->passport) }}" alt="" width="200">
        <input type="file" name="passport" placeholder="passport" >
        <textarea name="address" id="" cols="30" rows="10" placeholder="address">{{ $teacher->address }}</textarea>
        <select name="marital_status" id="">
            @foreach ($marital_status as $status)
                    <option value="{{ $status }}" {{ $status == $teacher->marital_status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
        <input type="date" name="date_of_employment" placeholder="date of employment" value="{{ $teacher->date_of_employment }}">
        <button>submit</button>
    </form>
@endsection

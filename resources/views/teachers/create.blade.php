@extends('layouts.app')

@section('content')
    <form action="{{ route('teachers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="phone" placeholder="phone">
        <input type="file" name="passport" placeholder="passport">
        <textarea name="address" id="" cols="30" rows="10" placeholder="address"></textarea>
        <select name="marital_status" id="">
            @foreach ($marital_status as $status)
                <option value="{{ $status }}">{{ $status }}</option>
            @endforeach
        </select>
        <input type="date" name="date_of_employment" placeholder="date of employment">
        <button>submit</button>
    </form>
@endsection

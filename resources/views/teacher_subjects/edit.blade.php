@extends('layouts.app')

@section('content')
    <form action="{{ route('classrooms.update', $classroom->id) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="text" name="name" placeholder="classroom" value="{{ $classroom->name }}">
        <button>submit</button>
    </form>
@endsection

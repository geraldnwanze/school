@extends('layouts.app')

@section('content')
    <form action="{{ route('subjects.update', $subject->id) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="text" name="name" placeholder="subject" value="{{ $subject->name }}">
        <button>submit</button>
    </form>
@endsection

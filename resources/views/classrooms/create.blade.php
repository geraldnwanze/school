@extends('layouts.app')

@section('content')
    <form action="{{ route('classrooms.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="classroom">
        <button>submit</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <form action="{{ route('subjects.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="subject">
        <button>submit</button>
    </form>
@endsection

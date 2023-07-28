@extends('layouts.app')

@section('content')
    <form action="{{ route('sub-classrooms.store') }}" method="post">
        @csrf
        <select name="classroom_id" >
            @forelse ($classrooms as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @empty
                <option value=""></option>
            @endforelse
        </select>
        <input type="text" name="name" placeholder="sub classroom">
        <button>submit</button>
    </form>
@endsection

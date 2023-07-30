@extends('layouts.app')

@section('content')
    <form action="{{ route('teacher-classrooms.store') }}" method="post">
        @csrf
        <select name="teacher_id" id="">
            <option value="">select teacher</option>
            @forelse ($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @empty
                <option value="">no data</option>
            @endforelse
        </select>

        @forelse ($classrooms as $class)
            <input type="checkbox" name="classroom_id[]" id="" value="{{ $class->id }}">{{ $class->name }}
        @empty
            no data available
        @endforelse

        <button>submit</button>
    </form>
@endsection

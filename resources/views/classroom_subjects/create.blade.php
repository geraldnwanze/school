@extends('layouts.app')

@section('content')
    <form action="{{ route('classroom-subjects.store') }}" method="post">
        @csrf
        <select name="classroom_id" id="">
            @forelse ($classrooms as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
            @empty
                <option value=""></option>
            @endforelse
        </select>
        @forelse ($subjects as $subject)
            <input type="checkbox" name="subject_id[]" id="" value="{{ $subject->id }}">{{ $subject->name }}
        @empty
            no data available
        @endforelse
        <button>submit</button>
    </form>
@endsection

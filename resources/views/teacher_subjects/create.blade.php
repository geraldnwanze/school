@extends('layouts.app')

@section('content')
    <form action="{{ route('teacher-subjects.store') }}" method="post">
        @csrf
        <select name="teacher_id" id="">
            <option value="">select teacher</option>
            @forelse ($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @empty
                <option value="">no data</option>
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

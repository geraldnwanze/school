
@yield('content')


@include('sweetalert::alert')


<ul>
    <li>
        <a href="{{ route('classrooms.index') }}">classrooms</a>
    </li>
    <li>
        <a href="{{ route('students.index') }}">students</a>
    </li>
</ul>
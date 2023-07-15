@extends('layouts.app')

@section('content')
<div class="container">
    @livewire('scheules', ['department' => $department , 'level' => $level , 'courses' => $courses
    , 'teachers' => $lecturers , 'rooms' => $rooms
    ])
</div>

@endsection

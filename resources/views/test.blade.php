@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Courses</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course name</th>
                                <th scope="col">Course type</th>
                                <th scope="col">Department</th>
                                <th scope="col">Level</th>
                                <th scope="col">Lecturer</th>
                                <th scope="col">time units in week</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $course )
                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{$course->name}}</td>
                                <td>
                                    @if ($course->type == 0)
                                        نضري
                                        @else
                                        عملي
                                    @endif
                                </td>
                                <td>{{$course->department->name}}</td>
                                <td>{{$course->level->name}}</td>
                                <td>{{$course->lecturer->name}}</td>
                                <td>{{$course->time_units->count()}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Departments</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Department name</th>
                                <th scope="col">Number of levels</th>
                                <th scope="col">Number of time-tables</th>
                                <th scope="col">Number of time-units</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($departments as $department )
                            <tr>
                                <td>{{$department->id}}</td>
                                <td>{{$department->name}}</td>
                                <td>{{$department->levels->count()}}</td>
                                <td>{{$department->time_tables->count()}}</td>
                                <td>{{$department->time_units->count()}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div><br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Levels</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Level name</th>
                                <th scope="col">Department of level</th>
                                <th scope="col">number of time-tables</th>
                                <th scope="col">number of time-units</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($levels as $level )
                            <tr>
                                <td>{{$level->id}}</td>                                
                                <td>{{$level->name}}</td>
                                <td>{{$level->department->name}}</td>
                                <td>{{$level->time_tables->count()}}</td>
                                <td>{{$level->time_units->count()}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lecturers</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Lecturer name</th>
                                <th scope="col">Short name</th>
                                <th scope="col">time units in week</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lecturers as $lecturer )
                            <tr>
                                <td>{{$lecturer->id}}</td>                                
                                <td>{{$lecturer->name}}</td>
                                <td>{{$lecturer->short_name}}</td>
                                <td>{{$lecturer->time_units->count()}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rooms</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">type</th>
                                <th scope="col">Seats number</th>
                                <th scope="col">Time_units number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($rooms as $room )
                            <tr>
                                <td>{{$room->id}}</td>                                
                                <td>{{$room->name}}</td>
                                <td>
                                    @if ($room->type == 0)
                                        قاعة
                                        @else
                                        معمل
                                    @endif
                                </td>
                                <td>{{$room->seats_num}}</td>   
                                <td>{{$room->time_units->count()}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

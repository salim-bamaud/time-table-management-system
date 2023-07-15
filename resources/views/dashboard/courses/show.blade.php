@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{__('site.Courses')}}</div>
                    <div class="card-body">
                        
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        
                        <div class="form-group">
                            <label> {{__('site.level')}} :</label>
                            <select class="form-control" id="level">
                                <option value=""> {{__('site.all')}} </option>
                                @foreach ($levels as $level)
                                    <option value="{{$level->id}}">{{$level->department->name}}-{{$level->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"> {{__('site.Course')}} </th>
                                <th scope="col"> {{__('site.type')}} </th>
                                <th scope="col"> {{__('site.Department')}} </th>
                                <th scope="col"> {{__('site.level')}} </th>
                                <th scope="col"> {{__('site.num-of-lectures-in-week')}} </th>
                                <th scope="col"> {{__('site.Lecturer')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $course )
                            <tr data-level="{{$course->lev_id}}">                             
                                <td>{{$course->name}}</td>
                                <td>@if ($course->type == 0)
                                    {{__('site.theoretical')}} 
                                    @else
                                    {{__('site.practical')}} 
                                @endif</td>
                                <td>{{$course->department->name}}</td>
                                <td>{{$course->level->name}}</td>
                                <td>{{$course->time_units_in_week}}</td>
                                <td>
                                    @if ($course->lect_id)
                                    {{$course->lecturer->short_name}}
                                    <form method="POST" action="{{ route('courses.connect', $course->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"> {{__('site.edit-lecturer')}} </button>
                                    </form>
                                     
                                    @else
                                    <form method="POST" action="{{ route('courses.connect', $course->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-success"> {{__('site.connect-with-lecturer')}} </button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    <a href="edit/{{$course->id}}" class="btn btn-success"> {{__('site.edit')}} </a> 
                                    <a href="delete/{{$course->id}}" class="btn btn-danger"> {{__('site.delete')}} </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary"> {{__('site.addcourse')}} </a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#level').change(function() {
            var lev_id = $(this).val();
            $('tbody tr').each(function() {
                if (lev_id == "" || $(this).data('level') == lev_id) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endsection

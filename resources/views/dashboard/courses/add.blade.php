@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('site.addcourse')}}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('courses.store')}}">
                            @csrf
                            <div class="form-group">
                          @livewire('cascading-dropdown')
                          <br>
                          <label> {{__('site.coursename')}}</label>
                                <input type="text" class="form-control" name="name" placeholder="Mobile Apps Development">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>

                            <label> {{__('site.num-of-lectures-in-week')}} </label>
                                <input type="number" class="form-control" name="time_units_in_week" placeholder="1">
                                @error('time_units_in_week')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  {{__('site.type')}} </label>
                                  <select class="custom-select" name="type">
                                    <option value="0"> {{__('site.theoretical-just')}} </option>
                                    <option value="1"> {{__('site.course-have-lap')}} </option>
                                  </select>
                                @error('type')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary"> {{__('site.save')}} </button>
                            </div>
                        </form>

                    </div>
            </div>
            <br>
            <a href="show" class="btn btn-info"> {{__('site.show-courses')}} </a>
        </div>
    </div>


    @endsection

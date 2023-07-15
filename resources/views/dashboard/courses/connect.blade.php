@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h3>{{__('site.Connect')}} ({{ $course->name }}) {{__('site.to-a-teacher')}}</h3>
            <form method="POST" action="{{ route('courses.assign', $course->id) }}">
                @csrf
                <select name="lect_id">
                    @foreach ($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success">{{__('site.Connect')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection
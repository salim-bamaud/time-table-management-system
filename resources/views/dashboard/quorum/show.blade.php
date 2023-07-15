@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
           <h2 class="text-center mb-4"> {{__('site.choose-department')}} </h2>
           @foreach ($departments as $department)
           <form method="POST" action="{{ route('quorum.print', $department->id) }}">
            @csrf
            <button type="submit" class="btn btn-success btn-block mt-2"><h4>{{$department->name}}</h4></button>
           </form>
           @endforeach
        </div>
    </div>
</div
@endsection

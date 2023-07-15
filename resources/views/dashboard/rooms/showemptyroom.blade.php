@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('site.empty-rooms-at')}} {{$times[$number-1]}} </div>
                @if (count($rooms))
                    @foreach ($rooms as $room)
                        <h4> {{$room->name}} </h4>
                    @endforeach
                @else
                    <h3>{{__('site.No-empty-rooms-at-this-time')}}</h3>
                @endif
                    
            </div>
            <br>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('site.empty-laps-at')}} {{$times[$number-1]}} </div>
                @if (count($laps))
                    @foreach ($laps as $lap)
                    <h4> {{$lap->name}} </h4>
                    @endforeach
                @else
                <h3>{{__('site.no-empty-laps-at-this-time')}}</h3>
                @endif
                    
            </div>
            <br>
        </div>
    </div>
</div>
@endsection

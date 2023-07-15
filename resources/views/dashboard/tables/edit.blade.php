@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{__('site.Edit-Schedule-of')}} {{$table->name}} </h3>
    @livewire('edit-schedule',['table' => $table])
</div>
@endsection

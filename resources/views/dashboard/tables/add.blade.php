@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.add-table')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('tables.create-table')}}">
                            @csrf
                            <div class="form-group">
                          @livewire('cascading-dropdown')
                          <br>
                          
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary">{{__('site.next')}}</button>
                            </div>
                        </form>

                    </div>
            </div>
            <br>
            <a href="show" class="btn btn-info">  {{__('site.show-tables')}}  </a>
        </div>
    </div>


    @endsection

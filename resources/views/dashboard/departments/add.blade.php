@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.add-department')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('departments.store')}}">
                            @csrf
                            <div class="form-group">
                                <label> {{__('site.department-name')}} </label>
                                <input type="text" class="form-control" name="name" placeholder="Computer science">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-primary"> {{__('site.save')}} </button>
                            </div>
                        </form>

                    </div>
            </div>
            <br>
            <a href="show" class="btn btn-info"> {{__('site.show-departments')}} </a>
        </div>
    </div>
</div>
@endsection

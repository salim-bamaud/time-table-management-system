@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.edit-lecturere')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('lecturers.update',$lecturer->id)}}">
                            @csrf
                            <div class="form-group">
                                <label> {{__('site.name')}}  </label>
                                <input type="text" class="form-control" name="name" value="{{$lecturer->name}}">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <label>  {{__('site.short-name')}}  </label>
                                <input type="text" class="form-control" name="short_name" value="{{$lecturer->short_name}}">
                                <br>
                                @error('short_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <br>
                                <label>  {{__('site.contracting-case')}}   </label>
                                <select name="contract_status">
                                    <option value="0"> {{__('site.constant')}} </option>
                                    <option value="1"> {{__('site.contracred')}} </option>
                                </select>
                                <br><br>
                                <button type="submit" class="btn btn-primary"> {{__('site.save')}} </button>
                            </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

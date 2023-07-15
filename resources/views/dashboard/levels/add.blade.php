@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.add-level')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('levels.store')}}">
                            @csrf
                            <div class="form-group">
                                <label> {{__('site.level-name')}}  </label>
                                <input type="text" class="form-control" name="name" placeholder="Fourth level">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  {{__('site.Department')}} </label>
                                  <select class="custom-select" name="dep_id">
                                      @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                      @endforeach
                                  </select>
                                @error('dep_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label> {{__('site.numm-of-students')}} </label>
                                <input type="number" class="form-control" name="students_num" placeholder="80">
                                @error('students_num')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>

                    </div>
            </div>
            <br>
            <a href="show" class="btn btn-info"> {{__('site.show-levels')}}  </a>
        </div>
    </div>
</div>
@endsection

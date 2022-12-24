@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل كورس</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('courses.update',$course->id)}}">
                            @csrf
                            <div class="form-group">
                                <label> أسم الكورس </label>
                                <input type="text" class="form-control" name="name" value="{{$course->name}}">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  النوع </label>
                                  <select class="custom-select" name="type">
                                    <option value="0">نضري</option>
                                    <option value="1">عملي</option>
                                  </select>
                                @error('type')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  القسم  </label>
                                    <select class="custom-select" name="dep_id">
                                      @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                      @endforeach
                                    </select>
                                @error('dep_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  المستوى  </label>
                                <select class="custom-select" name="lev_id">
                                    @foreach ($levels as $level)
                                      <option value="{{$level->id}}">{{$level->name}}</option>
                                    @endforeach
                                  </select>
                                @error('lev_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  المحاضر  </label>
                                <select class="custom-select" name="lecr_id">
                                    @foreach ($lecturers as $lecturer)
                                      <option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                                    @endforeach
                                  </select>
                                @error('lecr_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

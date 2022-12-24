@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل مستوى</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('levels.update',$level->id)}}">
                            @csrf
                            <div class="form-group">
                                <label> المستوى  </label>
                                <input type="text" class="form-control" name="name" value="{{$level->name}}">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <label>  التخصص </label>
                                <br>
                                  <select class="custom-select" name="dep_id">
                                      @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                      @endforeach
                                  </select>
                                @error('dep_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                
                                @error('dep_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <label> عدد الطلاب </label>
                                <input type="text" class="form-control" name="students_num" value="{{$level->students_num}}">
                                @error('students_num')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
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

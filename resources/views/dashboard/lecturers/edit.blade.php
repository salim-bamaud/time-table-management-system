@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل محاضر</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('lecturers.update',$lecturer->id)}}">
                            @csrf
                            <div class="form-group">
                                <label> الإسم  </label>
                                <input type="text" class="form-control" name="name" value="{{$lecturer->name}}">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <label>  الإسم المختصر </label>
                                <input type="text" class="form-control" name="short_name" value="{{$lecturer->short_name}}">
                                <br>
                                @error('short_name')
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

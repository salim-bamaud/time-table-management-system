@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">إضافة محاضر</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('lecturers.store')}}">
                            @csrf
                            <div class="form-group">
                                <label> أسم المحاضر </label>
                                <input type="text" class="form-control" name="name" placeholder="Salim Saleh">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  الإسم المختصر </label>
                                <input type="text" class="form-control" name="short_name" placeholder="D.Salim">
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
            <br>
            <a href="show" class="btn btn-info"> عرض كل المحاضرين </a>
        </div>
    </div>
</div>
@endsection

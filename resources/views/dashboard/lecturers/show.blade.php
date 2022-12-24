@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">المحاضرون</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">إسم المحاضر</th>
                                <th scope="col">الإسم المختصر</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lecturers as $lecturer )
                            <tr>                             
                                <td>{{$lecturer->name}}</td>
                                <td>{{$lecturer->short_name}}</td>
                                <td>
                                    <a href="edit/{{$lecturer->id}}" class="btn btn-success">تعديل</a> 
                                    <a href="delete/{{$lecturer->id}}" class="btn btn-danger">حذف</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary">إضافة محاضر</a>
        </div>
    </div>
</div>
@endsection

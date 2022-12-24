@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">الأقسام</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">الإسم</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($departments as $department )
                            <tr>                             
                                <td>{{$department->name}}</td>
                                <td>
                                    <a href="edit/{{$department->id}}" class="btn btn-success">تعديل</a> 
                                    <a href="delete/{{$department->id}}" class="btn btn-danger">حذف</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary">إضافة قسم</a>
        </div>
    </div>
</div>
@endsection

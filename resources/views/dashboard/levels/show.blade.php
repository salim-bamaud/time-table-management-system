@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">المستويات</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">المستوى</th>
                                <th scope="col">التخصص</th>
                                <th scope="col">عدد الطلاب</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($levels as $level )
                            <tr>                             
                                <td>{{$level->name}}</td>
                                <td>{{$level->department->name}}</td>
                                <td>{{$level->students_num}}</td>
                                <td>
                                    <a href="edit/{{$level->id}}" class="btn btn-success">تعديل</a> 
                                    <a href="delete/{{$level->id}}" class="btn btn-danger">حذف</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary">إضافة مستوى</a>
        </div>
    </div>
</div>
@endsection

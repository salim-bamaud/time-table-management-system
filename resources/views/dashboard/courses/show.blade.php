@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">الكورسات</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">الكورس</th>
                                <th scope="col">النوع</th>
                                <th scope="col">التخصص</th>
                                <th scope="col">المستوى</th>
                                <th scope="col">المحاضر</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $course )
                            <tr>                             
                                <td>{{$course->name}}</td>
                                <td>@if ($course->type == 0)
                                    نضري
                                    @else
                                    عملي
                                @endif</td>
                                <td>{{$course->department->name}}</td>
                                <td>{{$course->level->name}}</td>
                                <td>{{$course->lecturer->name}}</td>
                                <td>
                                    <a href="edit/{{$course->id}}" class="btn btn-success">تعديل</a> 
                                    <a href="delete/{{$course->id}}" class="btn btn-danger">حذف</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary">إضافة كورس</a>
        </div>
    </div>
</div>
@endsection

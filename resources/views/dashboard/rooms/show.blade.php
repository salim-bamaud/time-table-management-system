@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">القاعات</div>

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
                                <th scope="col">النوع</th>
                                <th scope="col">عدد المقاعد</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($rooms as $room )
                            <tr>                             
                                <td>{{$room->name}}</td>
                                <td>
                                    @if ($room->type == 0)
                                        قاعة
                                        @else
                                        معمل
                                    @endif
                                </td>
                                <td>{{$room->seats_num}}</td>
                                <td>
                                    <a href="edit/{{$room->id}}" class="btn btn-success">تعديل</a> 
                                    <a href="delete/{{$room->id}}" class="btn btn-danger">حذف</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary">إضافة قاعة</a>
        </div>
    </div>
</div>
@endsection

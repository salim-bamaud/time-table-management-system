@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.Levels')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        @if (Session::has('message'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"> {{__('site.level')}} </th>
                                <th scope="col"> {{__('site.Department')}} </th>
                                <th scope="col"> {{__('site.numm-of-students')}} </th>
                                <th scope="col"> {{__('site.actions')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($levels as $level )
                            <tr>                             
                                <td>{{$level->name}}</td>
                                <td>{{$level->department->name}}</td>
                                <td>{{$level->students_num}}</td>
                                <td>
                                    <a href="show-table/{{$level->id}}" class="btn btn-success"> {{__('site.show-table')}} </a> 
                                    <a href="edit/{{$level->id}}" class="btn btn-success"> {{__('site.edit')}} </a> 
                                    <a href="delete/{{$level->id}}" class="btn btn-danger"> {{__('site.delete')}} </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary"> {{__('site.add-level')}} </a>
        </div>
    </div>
</div>
@endsection

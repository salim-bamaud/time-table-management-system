@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.Departments')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"> {{__('site.name')}} </th>
                                <th scope="col"> {{__('site.actions')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($departments as $department )
                            <tr>                             
                                <td>{{$department->name}}</td>
                                <td>
                                    <a href="edit/{{$department->id}}" class="btn btn-success"> {{__('site.edit')}} </a> 
                                    <a href="delete/{{$department->id}}" class="btn btn-danger"> {{__('site.delete')}} </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary">  {{__('site.add-department')}}  </a>
        </div>
    </div>
</div>
@endsection

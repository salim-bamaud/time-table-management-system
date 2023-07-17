@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('site.tables')}}</div>
                
            <a href="create" class="btn btn-primary"> {{__('site.add-table')}} </a>
                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{__('site.table')}}</th>
                                <th scope="col">{{__('site.Department')}}</th>
                                <th scope="col">{{__('site.level')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tables as $table )
                            <tr>                             
                                <td>{{$table->name}}</td>
                                <td>{{$table->department->name}}</td>
                                <td>{{$table->level->name}}</td>
                                <td>
                                    <a href="show-table/{{$table->id}}" class="btn btn-primary">{{__('site.show')}}</a>
                                    {{-- <a href="edit/{{$table->id}}" class="btn btn-success">{{__('site.edit')}}</a>  --}}
                                    <a href="print/{{$table->id}}" class="btn btn-success">{{__('site.print')}}</a>
                                    <a href="delete/{{$table->id}}" class="btn btn-danger">{{__('site.delete')}}</a>
                                                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection

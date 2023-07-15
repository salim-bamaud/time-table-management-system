@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="findemptyrooms" class="btn btn-primary"> {{__('site.find-empty-room')}} </a> 
            <a href="findemptylaps" class="btn btn-primary"> {{__('site.find-empty-lap')}} </a> 
            <a href="#" class="btn btn-primary"> {{__('site.show-laps-table')}} </a>
            <br><br>
            <div class="card">
                <div class="card-header">{{__('site.Rooms')}}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{__('site.name')}}</th>
                                <th scope="col">{{__('site.type')}}</th>
                                <th scope="col">{{__('site.num-of-seats-in-room')}}</th>
                                <th scope="col">{{__('site.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($rooms as $room )
                            <tr>                             
                                <td>{{$room->name}}</td>
                                <td>
                                    @if ($room->type == 0)
                                        {{__('site.Room')}}
                                        @else
                                        {{__('site.lap')}}
                                    @endif
                                </td>
                                <td>{{$room->seats_num}}</td>
                                <td>                                    
                                    <a href="show-table/{{$room->id}}" class="btn btn-primary"> {{__('site.show-table')}} </a> 
                                    <a href="edit/{{$room->id}}" class="btn btn-success">{{__('site.edit')}}</a> 
                                    <a href="delete/{{$room->id}}" class="btn btn-danger">{{__('site.delete')}}</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary"> {{__('site.add-room')}} </a>
            <a class="btn btn-success" href="{{route('rooms.export')}}"> {{__('site.export-to-pdf')}} </a>
        </div>
    </div>
</div>
@endsection

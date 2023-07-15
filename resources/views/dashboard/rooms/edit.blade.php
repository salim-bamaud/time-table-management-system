@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.edit-room')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('rooms.update',$room->id)}}">
                            @csrf
                            <div class="form-group">
                                <label> {{__('site.room-name')}} </label>
                                <input type="text" class="form-control" name="name" value="{{$room->name}}">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label> {{__('site.room-type')}} </label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="type" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="customRadioInline1"> قاعة محاضرات عادية </label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="type" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="customRadioInline2">  Lap معمل </label>
                                    <br>
                                    @error('type')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <label> {{__('site.num-of-seats-in-room')}} </label>
                                <input type="number" class="form-control" name="seats_num" value="{{$room->seats_num}}">
                                    @error('seats_num')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                <br>
                                <button type="submit" class="btn btn-primary"> {{__('site.save')}} </button>
                            </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

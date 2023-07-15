@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.add-room')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('rooms.store')}}">
                            @csrf
                            <div class="form-group">
                                <label> أسم القاعة </label>
                                <input type="text" class="form-control" name="name" placeholder="H0-1">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label> {{__('site.room-type')}} </label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="type" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="customRadioInline1"> {{__('site.room')}} </label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="type" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="customRadioInline2"> {{__('site.lap')}} </label>
                                    <br>
                                    @error('type')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <label> {{__('site.num-of-seats-in-room')}} </label>
                                <input type="number" class="form-control" name="seats_num" placeholder="100">
                                    @error('seats_num')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                <br>
                                <button type="submit" class="btn btn-primary"> {{__('site.save')}} </button>
                            </div>
                        </form>

                    </div>
            </div>
            <br>
            <a href="show" class="btn btn-info">  {{__('site.show-rooms')}}  </a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.find-empty-room')}} </div>

                    <div class="card-body text-center">
                           {{__('site.choose-time')}} 
                        <table>
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">{{__('site.Day')}}</th>
                                    @foreach ($times as $time)
                                        <th class="border px-4 py-2">{{$time}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($days as $key1=>$day)
                                    <tr>
                                        <td class="border px-4 py-2"> {{$day}} </td>
                                        @foreach ($times as $key2=>$time)
                                            <td>
                                                <a href="findemptyroom/{{$key1*3+$key2+1}}" style="margin: 5%" class="btn btn-primary">{{__('site.find')}}</a>
                                            </td>
                                        @endforeach
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

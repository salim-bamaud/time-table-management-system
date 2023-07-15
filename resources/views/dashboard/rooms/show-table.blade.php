@extends('layouts.app')

@section('content')
<div>
    <h1> {{__('site.weekly-shedule-of')}} {{$room->name}} {{__('site.Room')}}</h1>
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
                        <td class="border px-4 py-2">
                           <label>
                            @if ($time_units->where('number',($key1*3+$key2+1))->first())
                                {{$time_units->where('number',($key1*3+$key2+1))->first()->department->name}}
                                {{$time_units->where('number',($key1*3+$key2+1))->first()->level->name}}
                                <br>
                                {{$time_units->where('number',($key1*3+$key2+1))->first()->lecturer->name}}
                                {{$time_units->where('number',($key1*3+$key2+1))->first()->course->name}}
                            @else
                                - 
                            @endif
                           </label>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{-- <a class="btn btn-success" href="{{route('rooms.export')}}"> print </a> --}}
    </div>
</div>
@endsection
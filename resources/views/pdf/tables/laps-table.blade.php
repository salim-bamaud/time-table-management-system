<!DOCTYPE html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: 'XBRiyaz' , sans-serif;
            text-align: center;
        }
        table{
            border-collapse: collapse;
        }
        th, td{
            padding: 2%;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    
    <div>
    <h1>{{__('site.weekly-shedule-of')}} {{__('site.laps')}} </h1>
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
                                {{$time_units->where('number',($key1*3+$key2+1))->first()->label}}
                            @else
                                {{__('site.discussion')}}  
                            @endif
                           </label>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
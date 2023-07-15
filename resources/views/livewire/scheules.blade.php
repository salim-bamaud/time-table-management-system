<div>
    <h3>{{__('site.Craeate-Schedule-for')}}  <b>{{$department->name}} {{$level->name}}</b> </h3>
    
    <form wire:submit.prevent="saveSchedule">
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
                            <select wire:model="schedule.{{$day}}.{{$time}}.{{'course'}}">
                                <option value="-" selected>{{__('site.Course')}}</option>
                                @foreach ($courses as $course)
                                    <option value="{{$course->id}}"> {{$course->name}} </option>
                                @endforeach
                            </select>
                            
                            @if (!is_null($schedule[$day][$time]['course'])&&($schedule[$day][$time]['course']!="-")&&($schedule[$day][$time]['course']!="discussion"))
                            <select wire:model="schedule.{{$day}}.{{$time}}.{{'teacher'}}">
                                <option value="" >{{__('site.Lecturer')}}</option>
                                @foreach ($teachers as $teacher)
                                        @if (!$teacher->time_units->contains('number',$key1 * 3 + $key2 + 1))
                                        <option value="{{$teacher->id}}"
                                            {{-- @if ($courses->where('id',$schedule[$day][$time]['course'])->first()->lecturer==$teacher)
                                                selected
                                            @endif --}}
                                            > {{$teacher->name}} </option>
                                        @endif
                                @endforeach
                            </select>
                            @endif
                            @if (!is_null($schedule[$day][$time]['teacher'])&&($schedule[$day][$time]['teacher']!="-"))
                            <select wire:model="schedule.{{$day}}.{{$time}}.{{'room'}}">
                                <option value="-" selected>{{__('site.room')}}</option>
                                @foreach ($rooms as $room)
                                    {{-- get only lap rooms or normal class rooms depending on course type --}}
                                    @if ($room->type==($courses->where('id', $schedule[$day][$time]['course']))->first()->type)
                                    {{-- get only not busy rooms --}}
                                 
                                @if (!$room->time_units->contains('number',$key1 * 3 + $key2 + 1))
                                    <option value="{{$room->id}}" > 
                                          {{$room->name}} 
                                     </option>
                                @endif
                       
                                    @endif
                                @endforeach
                            </select>
                            @endif
                        </td>
                        @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> {{__('site.save')}}  </button>
    </form>
    <br>
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    <br>
    <h2>{{__('site.Preview')}}</h2>
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
            @foreach ($days as $day)
                <tr>
                    <td class="border px-4 py-2"> {{$day}} </td>
                    @foreach ($times as $time)
                        <td class="border px-4 py-2">
                            @if ($schedule[$day][$time]['course']=="discussion")
                                <label> discussion </label>
                            @endif
                            @if (!is_null($courses->where('id',$schedule[$day][$time]['course'])->first()))
                                <label>
                                    {{$courses->where('id',$schedule[$day][$time]['course'])->first()->name}}
                                </label>
                            @endif
                            @if (!is_null($rooms->where('id',$schedule[$day][$time]['room'])->first()))
                            <br>
                                <label>
                                    {{$rooms->where('id',$schedule[$day][$time]['room'])->first()->name}}
                                </label>
                            @endif
                            @if (!is_null($teachers->where('id',$schedule[$day][$time]['teacher'])->first()))
                            <br>
                                <label>
                                    {{$teachers->where('id',$schedule[$day][$time]['teacher'])->first()->short_name}}
                                </label>
                            @endif
                            @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

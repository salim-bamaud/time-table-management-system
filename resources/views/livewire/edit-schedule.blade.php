<div>
    <form wire:submit.prevent="saveSchedule">
        @csrf
        <table>
            <thead>
                <tr>
                    <th class="border px-4 py-2">{{{__('site.Day')}}}</th>
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
                                <select>
                                    {{-- <option value="" selected>course</option> --}}
                                    @foreach ($this->courses as $coursee)
                                        <option value="{{$coursee->id}}"
                                            @if ($coursee->id==$time_units->where('number',$key1 * 3 + $key2 + 1)->first()->course_id)
                                            selected
                                            @endif
                                        >
                                             {{$coursee->name}} 
                                        </option>
                                    @endforeach
                                    <option value="discussion">{{__('site.discussion')}}</option>
                                </select>
                                <select>
                                    {{-- <option value="" selected>room</option> --}}
                                    @foreach ($rooms as $roome)
                                        <option value="{{$roome->id}}"@if ($roome->id==$time_units->where('number',$key1 * 3 + $key2 + 1)->first()->room_id)
                                            selected
                                        @endif> {{$roome->name}} </option>
                                    @endforeach
                                </select>
                                <select>
                                    {{-- <option value="" selected>teacher</option> --}}
                                    @foreach ($teachers as $teachere)
                                        <option value="{{$teachere->id}}"@if ($teachere->id==$time_units->where('number',$key1 * 3 + $key2 + 1)->first()->lecr_id)
                                            selected
                                        @endif> {{$teachere->name}} </option>
                                    @endforeach
                                </select>
                               @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> save schedule </button>
        </form>
        {{-- @livewire('show-table',['id'=>$table->id]) --}}
</div>

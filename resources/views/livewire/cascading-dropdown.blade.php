<div>
    <div class="flex flex-col gap-6 w-[100px] mx-auto ">
        <select wire:model="dep_id" wire:change="changeDepartment" name="dep_id">
            <option value="-1"> {{__('site.Choose-dep')}} </option>
            @foreach ($departments as $department )
                <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
        </select>
        @error('dep_id')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
        <br>
        <div class="flex relative">
            <p wire:loading class="absolute left-0 top-0 right-0 bottom-0 z-10 bg-white bg-opacity-90 py-2 px-3">
                {{__('site.loading')}}...
            </p>
            <select wire:model="lev_id" class="flex-1" name="lev_id">
                <label>  {{__('site.level')}}  </label>
                <option value="-1"> {{__('site.Choose-level')}} </option>
                @foreach ($levels as $level )
                <option value="{{$level->id}}">{{$level->name}}</option>
            @endforeach
            </select>
            @error('lev_id')
                 <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <br>
        </div>
    </div>
</div>

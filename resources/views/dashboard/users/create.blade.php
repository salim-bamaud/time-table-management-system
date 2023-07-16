@extends('layouts.app')
@section('content')


<div class="content-wrapper">
    <section class="contnet-header">
        <h1> {{__('site.users')}} </h1>
    </section>
    <section class="content">
        <div class="container">
            <h2> add {{__('site.users')}} </h2>

        <form action="{{route('user.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">first_name</label>
                <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}" required>

                <label for="">last_name</label>
                <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}" required>

                <label for="">email</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}" required>

                <label for="">password</label>
                <input type="password" name="password" class="form-control" required>

                <label for="">password conformation</label>
                <input type="password" name="password_confirmation" class="form-control" required>

                <div class="form-group">
                    <label class="block mb-2">{{ __('site.permissions') }}</label>
                    <div class="flex flex-wrap items-center">
                      <label class="w-full md:w-1/2 lg:w-1/4 flex items-center mb-1 md:mb-0">
                        <input type="checkbox" class="form-check-input mr-2" name="permissions[]" value="users-create" checked>
                        <span>{{ __('site.read') }}</span>
                      </label>
                      
                      <label class="w-full md:w-1/2 lg:w-1/4 flex items-center mb-1 md:mb-0">
                        <input type="checkbox" class="form-check-input mr-2" name="permissions[]" value="users-read" checked>
                        <span>{{ __('site.create') }}</span>
                      </label>
                      
                      <label class="w-full md:w-1/2 lg:w-1/4 flex items-center mb-2 md:mb-0">
                        <input type="checkbox" class="form-check-input mr-2" name="permissions[]" value="users-update" checked>
                        <span>{{ __('site.update') }}</span>
                      </label>
                      
                      <label class="w-full md:w-1/2 lg:w-1/4 flex items-center">
                        <input type="checkbox" class="form-check-input mr-2" name="permissions[]" value="users-delete" checked>
                        <span>{{ __('site.delete') }}</span>
                      </label>
                    </div>
                  </div>

<br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">add</button>
                </div>
            </div>
        </form>
        </div>
        
    </section>
</div>


@endsection
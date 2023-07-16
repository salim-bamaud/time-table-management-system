@extends('layouts.app')
@section('content')


<div class="content-wrapper">
    <section class="contnet-header">
        <h1> {{__('site.users')}} </h1>
        <form action="">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="search">
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">search</button>
                    <a href="{{route('user.create')}}" class="btn btn-primary">create user</a>
                </div>
            </div>
        </form>
        <br>
    </section>
    <section class="content">
        <table class="w-full">
            <thead class="bg-gray-200">
              <tr>
                <th class="px-4 py-2">First Name</th>
                <th class="px-4 py-2">Last Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=>$user )
                <tr>
                    <td class="border px-4 py-2">{{$user->first_name}}</td>
                    <td class="border px-4 py-2">{{$user->last_name}}</td>
                    <td class="border px-4 py-2">{{$user->email}}</td>
                    <td class="border px-4 py-2">
                      <a href="{{route('user.edit', $user->id)}}" class="text-blue-500 hover:text-blue-700">Edit</a>
                      <form class="inline-block" action="{{route('user.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              
              <!-- Add more rows for each user -->
            </tbody>
          </table>
    </section>
</div>


@endsection
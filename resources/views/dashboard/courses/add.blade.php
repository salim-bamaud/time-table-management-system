@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">إضافة كورس</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('courses.store')}}">
                            @csrf
                            <div class="form-group">
                              {{-- {{result}}<br> --}}
                              <label>  القسم  </label>
                              <select id="select_dep"  class="custom_select" name="dep_id">
                                @foreach ($departments as $department)
                                  <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                              </select>
                          @error('dep_id')
                              <small class="form-text text-danger">{{$message}}</small>
                          @enderror
                          <br>
                          <label>  المستوى  </label>
                          <select class="custom-select" name="lev_id">
                              @foreach ($levels as $level)
                                <option value="{{$level->id}}">{{$level->name}}</option>
                              @endforeach
                            </select>
                          @error('lev_id')
                              <small class="form-text text-danger">{{$message}}</small>
                          @enderror
                          <br>
                                <label> أسم الكورس </label>
                                <input type="text" class="form-control" name="name" placeholder="Mobile Apps Development">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  النوع </label>
                                  <select class="custom-select" name="type">
                                    <option value="0">نضري</option>
                                    <option value="1">عملي</option>
                                  </select>
                                @error('type')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  المحاضر  </label>
                                <select class="custom-select" name="lecr_id">
                                    @foreach ($lecturers as $lecturer)
                                      <option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                                    @endforeach
                                  </select>
                                @error('lecr_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>

                    </div>
            </div>
            <br>
            <a href="show" class="btn btn-info"> عرض الكورسات </a>
        </div>
    </div>

    <script>
      var app = new Vue({
        el: '#app',
        data:{
          result: 0
        },
        methods:{

        }
      });
    </script>

    @endsection

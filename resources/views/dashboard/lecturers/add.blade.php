@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{__('site.add-lecturere')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <form method="POST" action="{{route('lecturers.store')}}">
                            @csrf
                            <div class="form-group">
                                <label> {{__('site.lecturer-name')}} </label>
                                <input type="text" class="form-control" name="name" placeholder="Salim Saleh">
                                @error('name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label>  {{__('site.short-name')}} </label>
                                <input type="text" class="form-control" name="short_name" placeholder="D.Salim">
                                @error('short_name')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label> {{__('site.collage')}} </label>
                                <input type="text" class="form-control" name="collage"  placeholder="كلية العلوم التطبيقية">
                                @error('collage')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <label> {{__('site.Department')}} </label>
                                <select class="custom-select" name="dep_id">
                                    @foreach ($departments as $department)
                                      <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>     
                                @error('dep_id')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br><br>
                                <label>  {{__('site.degree')}}  </label>
                                <input type="text" class="form-control" name="degree" placeholder="استاذ مساعد">
                                @error('degree')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <br>
                                <label>  {{__('site.contracting-case')}}  </label>
                                <select name="contract_status">
                                    <option value="0"> {{__('site.constant')}} </option>
                                    <option value="1"> {{__('site.contracred')}} </option>
                                </select>
                                @error('contract_status')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                <br>
                                <br>
                                <button type="submit" class="btn btn-primary"> {{__('site.save')}} </button>
                            </div>
                        </form>

                    </div>
            </div>
            <br>
            <a href="show" class="btn btn-info"> {{__('site.show-all-lecturers')}} </a>
        </div>
    </div>
</div>
@endsection

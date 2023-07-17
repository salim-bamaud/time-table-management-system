@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"> {{__('site.Lecturers')}} </div>

                    <div class="card-body">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif

                        <div class="form-group">
                            <label> {{__('site.Department')}} :</label>
                            <select class="form-control" id="department">
                                <option value=""> {{__('site.all')}} </option>
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"> {{__('site.lecturer-name')}} </th>
                                <th scope="col"> {{__('site.short-name')}} </th>
                                <th scope="col"> {{__('site.collage')}} </th>
                                <th scope="col"> {{__('site.Department')}} </th>
                                <th scope="col"> {{__('site.degree')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lecturers as $lecturer )
                            <tr style="white-space: nowrap" data-department="{{$lecturer->dep_id}}">                             
                                <td>{{$lecturer->name}}</td>
                                <td>{{$lecturer->short_name}}</td>
                                <td>{{$lecturer->collage}}</td>
                                <td>{{$lecturer->department->name}}</td>
                                <td>{{$lecturer->degree}} @if($lecturer->contract_status=='1')({{__('site.contracred')}}) @endif
                                </td>
                                <td>
                                    <a href="show-table/{{$lecturer->id}}" class="btn btn-primary"> {{__('site.show-table')}} </a>
                                    <a href="edit/{{$lecturer->id}}" class="btn btn-success"> {{__('site.edit')}} </a> 
                                    <a href="delete/{{$lecturer->id}}" class="btn btn-danger"> {{__('site.delete')}} </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
            <br>
            <a href="create" class="btn btn-primary"> {{__('site.add-lecturere')}} </a>
            <a class="btn btn-success" href="{{route('lecturers.export')}}"> {{__('site.export-to-pdf')}} </a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#department').change(function() {
            var dep_id = $(this).val();
            $('tbody tr').each(function() {
                if (dep_id == "" || $(this).data('department') == dep_id) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endsection

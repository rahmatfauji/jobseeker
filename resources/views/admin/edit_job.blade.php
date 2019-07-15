@extends('template.master')
@section('managejob','active')
@section('title','Edit Job Form')
@section('content')
<form method="POST" action="{{ route('update-job', $job->id)}}" class="form-horizontal" role="form" id="update-job">
{{ csrf_field() }} {{method_field('PUT')}}
<div class="card col-md-8 offset-2">
    <div class="card-header"><h4 class="card-header-info">Edit Job</h4></div>
    <div class="card-body">
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Name</label>
            <div class="col-md-12">
            <input id="name" type="text" class="form-control" name="name" value="{{$job->name}}" autofocus >
            <div class="text-danger">{!! $errors->first('name') !!}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="salary" class="col-md-4 control-label">Salary</label>
            <div class="col-md-12">
                <input id="salary" type="number" class="form-control" name="salary"  value="{{$job->salary}}">
                <div class="text-danger">{!! $errors->first('salary') !!}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="Description" class="col-md-4 control-label">Descriptions</label>
            <div class="col-md-12">
                <textarea name="descriptions" class="form-control" rows="10">{{$job->descriptions}}</textarea>
                <div class="text-danger">{!! $errors->first('descriptions') !!}</div>
            </div>
        </div>
    
    </div>
    <div class="card-footer">
        <div class="form-group">
                <div class="col-md-12">
                    {{-- <a class="btn-sm btn-info" href="" onclick="
                    event.preventDefault();
                    document.getElementById('update-job').submit();
                    ">Update</a> --}}
                    <input type="submit" value="Update" class="btn btn-info">
                    <a href="{{url('manage-jobs')}}" class="btn btn-danger">Back</a>
                </div>
        </div>
    </div>
</div>
</form>   
@endsection
@extends('template.master')
@section('managejob','active')
@section('title','Add Job Form')
@section('content')
<form method="POST" action="{{ route('insert-job')}}" class="form-horizontal" role="form">
        {{ csrf_field() }} {{method_field('POST')}}
<div class="card col-md-8 offset-2">
    <div class="card-header"><h4 class="card-header-info">Add Job</h4></div>
    <div class="card-body">
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Name</label>
            <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                <div class="text-danger">{!! $errors->first('name') !!}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="salary" class="col-md-4 control-label">Salary</label>
            <div class="col-md-12">
                <input id="salary" type="number" class="form-control" name="salary" value="{{ old('salary') }}">
                <div class="text-danger">{!! $errors->first('salary') !!}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="Description" class="col-md-4 control-label">Descriptions</label>
            <div class="col-md-12">
                <textarea name="descriptions" class="form-control" rows="10">{{ old('descriptions') }}</textarea>
                <div class="text-danger">{!! $errors->first('descriptions') !!}</div>
            </div>
        </div>
    
    </div>
    <div class="card-footer">
        <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-info">Save</button>
                    <a href="{{url('manage-jobs')}}" class="btn btn-danger">Back</a>
                </div>
        </div>
    </div>
</div>
</form>   
@endsection
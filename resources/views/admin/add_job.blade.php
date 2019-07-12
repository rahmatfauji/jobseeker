@extends('template.master')
@section('managejob','active')
@section('content')
<form method="POST" action="{{ route('insert-job')}}" class="form-horizontal" role="form">
        {{ csrf_field() }} {{method_field('POST')}}
<div class="card col-md-8 offset-2">
    <div class="card-header">Add Jobs</div>
    <div class="card-body">
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Name</label>
            <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="salary" class="col-md-4 control-label">Salary</label>
            <div class="col-md-12">
                <input id="salary" type="number" class="form-control" name="salary" value="{{ old('salary') }}" required>
                @if ($errors->has('salary'))
                    <span class="help-block">
                        <strong>{{ $errors->first('salary') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="Description" class="col-md-4 control-label">Descriptions</label>
            <div class="col-md-12">
                <textarea name="descriptions" class="form-control" rows="10">{{ old('descriptions') }}</textarea>
                     @if ($errors->has('descriptions'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descriptions') }}</strong>
                    </span>
                @endif
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
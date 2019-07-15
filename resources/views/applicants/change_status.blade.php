@extends('template.master')
@section('manageappli','active')
@section('title','Process Application')
@section('content')
<form method="POST" action="{{ route('update-status')}}" class="form-horizontal" role="form" id="update-job">
{{ csrf_field() }} {{method_field('POSt')}}


<div class="card col-md-8 offset-2">
    <div class="card-header"><h4 class="card-header-info">Process Application</h4></div>
    <div class="card-body">
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Name</label>
            <div class="col-md-12">
            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" autofocus disabled>
            <div class="text-danger">{!! $errors->first('name') !!}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="salary" class="col-md-4 control-label">Position</label>
            <div class="col-md-12">
                <input id="salary" type="text" class="form-control" name="jobname"  value="{{$job->name}}" disabled>
                <div class="text-danger">{!! $errors->first('jobname') !!}</div>
            </div>
        </div>
        <input type="hidden" name="user_id" value="{{$job->pivot->user_id}}">
        <input type="hidden" name="job_id" value="{{$job->pivot->job_id}}">
        <div class="form-group">
            <label for="status" class="col-md-4 control-label">Status</label>
            <div class="col-md-12">
                <select name="status" class="form-control">
                    <option value="unread" {{$u}}>Unread</option>
                    <option value="accept" {{$a}}>Accept</option>
                    <option value="reject" {{$r}}>Reject</option>
                </select>
                <div class="text-danger">{!! $errors->first('status') !!}</div>
            </div>
        </div>

        <div class="form-group">
            <label for="salary" class="col-md-4 control-label">Message</label>
            <div class="col-md-12">
            <textarea name="message" class="form-control" rows="10">{{$job->pivot->message}}</textarea>
                <div class="text-danger">{!! $errors->first('message') !!}</div>
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
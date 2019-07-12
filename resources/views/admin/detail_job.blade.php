@extends('template.master')
@section('managejob','active')
@section('content')
<div class="card">
    <div class="card-header"><h4 class="card-header-info">Detail Job Information</h4></div>
    <div class="card-body">
    {{-- <blockquote class="blockquote">
    <p class="mb-0">Descriptions: {{$job->descriptions}}</p>
    <footer class="blockquote-footer">Salary:  <cite title="Source Title">{{$job->salary}}</cite></footer>
    </blockquote> --}}

    <dl class="row">
            <dt class="col-sm-3">Job Position</dt>
            <dd class="col-sm-9">{{$job->name}}</dd>
          
            <dt class="col-sm-3">Salary</dt>
            <dd class="col-sm-9">
              {{$job->salary}}
            </dd>
            
            <dt class="col-sm-3">Posted at</dt>
            <dd class="col-sm-9">{{$job->created_at}}</dd>

            <dt class="col-sm-3">Descriptions</dt>
            <dd class="col-sm-9"><pre style="font-family: 'Roboto'; font-size: 1rem;">{{$job->descriptions}}</pre></dd>
          
            
            
          </dl>
    </div>
</div>   
@endsection
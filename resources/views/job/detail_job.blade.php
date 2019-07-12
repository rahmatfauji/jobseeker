@extends('template.master')
@section('jobs','active')
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
            @foreach($job->users as $user)
            
            @endforeach
            @if (@$user->pivot->user_id <> Auth::user()->id)
            <dt class="col-sm-3 text-truncate"></dt>
            <dd class="col-sm-9">
                <form method="post" action="{{route('apply',$job->id)}}">
                    {{ csrf_field() }} {{method_field('POST')}}
                    <button type="submit" class="btn btn-success pull-right">Apply</button>
                </form></dd>
            @else
            <script>
            window.onload=function()
            {
              toastr.error("You was apply this job");
            } 
            </script> 
            @endif
            
            
          </dl>
    </div>
</div>   
@endsection
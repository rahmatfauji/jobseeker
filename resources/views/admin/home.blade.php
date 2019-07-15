@extends('template.master')
@section('dashboard','active')
@section('title','Homepage Admin')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 container" style="margin-top:50px; width: 800px;">
    <div class="card card-stats" style=" height:300px;">
      <div class="card-header card-header-info">
        <div class="card-icon">
          <i class="material-icons">layers</i>
        </div>
        <h4 class="card-title">Welcome</h4>
        <h3 class="card-title text-uppercase">{{ Auth::user()->name }}</h3>
      </div>
      <div class="card-body">
          
          <h3 class="card-blog text-center">Have a nice day, do the best for today </h3>
      </div>
      <div class="card-footer">
        <div class="stats">
        </div>
      </div>
    </div>
  </div>
  @foreach ($user as $item)
      
  @endforeach
  @php
  $job=$item->jobs_unread->count()
  @endphp

  @if($job>0)
  <script>
      window.onload=function()
      {
          toastr.info("{{$job}} Applicants wait your response");
      }
  </script>  
  @endif
   
  
  
@endsection      
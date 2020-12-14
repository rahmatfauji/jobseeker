@extends('template.master')
@section('dashboard','active')
@section('title','Homepage Admin')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 container" style="margin-top:50px; max-width: 800px;">
    <div class="card card-stats" style=" max-height:300px;">
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
  @php
   $no=0;   
  @endphp
  <div style="display: none;">
  @foreach ($user as $item)
      @foreach ($item->jobs_unread as $unread)
          {{$unread->pivot->status}}
          {{++$no}}
      @endforeach
  @endforeach
  </div>

  @if($no>0)
  <script>
      window.onload=function()
      {
          toastr.info("{{$no}} Applicants wait your response");
      }
  </script>  
  @endif
   
  
  
@endsection      
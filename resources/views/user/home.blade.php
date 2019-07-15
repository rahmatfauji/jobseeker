@extends('template.master')
@section('dashboard','active')
@section('title','Homepage user')
@section('content')
{{-- <div class="row" style="margin-top:15px; width: 700px;"> --}}
        <div class="col-lg-12 col-md-12 col-sm-12 container" style="margin-top:50px; width: 800px;">
          <div class="card card-stats"  style=" height:300px;">
            <div class="card-header card-header-info">
              <div class="card-icon">
                <i class="material-icons">layers</i>
              </div>
              <p class="card-title">Welcome</p>
              <h3 class="card-title">{{ Auth::user()->name }}</h3>
            </div>
            <div class="card-body">
                <h3 class="card-blog text-center">Have a nice day, now you can apply jobs in this web </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                {{-- <i class="material-icons text-danger">warning</i> --}}
                {{-- <a href="#">Get More Space...</a> --}}
              </div>
            </div>
          </div>
        </div>
        
        
      
      {{-- </div> --}}
@endsection      
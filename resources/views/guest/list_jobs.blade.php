@extends('template.guest')
@section('title','Careers Page')
@section('content')
<div class="card container" style="margin-top:80px;">
{{-- <div class="card-header bg-primary"><h4 style="color:#fff;">Career with us</h4></div> --}}
<div class="row" style="padding-right: 4rem; padding-left: 4rem;">


{{-- <div class="container" style="margin-top:80px;"> --}}
    @foreach ($job as $item)
    <div class="col-lg-4 col-sm-12" style="max-height: 15rem;">
    <div class="card bg-info">
        <div class="card-body">
          <h4 class="card-title">{{$item->name}}</h4>
          <p class="card-text">{{formatTanggalLong($item->created_at)}}</p>
          <p class="card-text">{{rupiahFormat($item->salary)}}</p>
          <p class="card-text">{{$item->descriptions}}</p>
          <a href="{{url('login')}}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    @endforeach
    <div class="card-footer col-12" style="margin-top: 1.5rem">{{$job->links('vendor.pagination.bootstrap-4')}}</div>

    {{-- <div class="card-header"><h4 style="color:#fff;">Career with us</h4></div>
    @foreach ($job as $item)
    <div class="card-body">
    <table class="table table-bordered" style="margin-bottom:-10px;">
        <tbody>
        <tr><th style="width:150px">Job Title</th><td>{{$item->name}}<a href="{{url('login')}}" class="btn-sm btn-success pull-right">Apply</a></td></tr>   
        <tr><th style="width:150px">Posted at</th><td>{{formatTanggalLong($item->created_at)}}</td></tr>
        <tr><th style="width:150px">Salary</th><td>{{rupiahFormat($item->salary)}}</td></tr>
        <tr><th style="vertical-align: top;">Descriptions</th><td><pre>{{$item->descriptions}}</pre></td></tr>
        </tbody>
    </table>        
    </div>
    @endforeach
    <div class="card-footer">{{$job->links('vendor.pagination.bootstrap-4')}}</div> --}}
{{-- </div> --}}

{{-- @endforeach  --}}
{{-- </div> --}}
</div>
</div>

@endsection
{{-- <div class="row">{{$job->links('vendor.pagination.bootstrap-4')}}</div> --}}

@extends('template.guest')
@section('title','Careers Page')
@section('content')
<div class="card container" style="margin-top:80px;">
<div class="row" style="padding-right: 4rem; padding-left: 4rem;">

    @foreach ($job as $item)
    <div class="col-lg-4 col-sm-12">
    <div class="card bg-secondary">
        {{-- <div class="card-header bg-primary"><h3 class="card-header-text">{{$item->name}}</h3></div> --}}
        <div class="card-body">
          <h4 class="card-title">{{$item->name}}</h4>
          {{formatTanggal($item->created_at)}}
          <p>{{$item->descriptions}}</p>
          <a href="{{url('login')}}" class="btn btn-sm btn-light">Apply</a>
          {{-- <p class="card-text">{{rupiahFormat($item->salary)}}</p> --}}
        </div>
      </div>
    </div>
    @endforeach
    <div class="card-footer col-12" style="margin-top: 1.5rem">{{$job->links('vendor.pagination.bootstrap-4')}}</div>

</div>
</div>

@endsection

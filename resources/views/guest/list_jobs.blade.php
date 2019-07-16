@extends('template.guest')
@section('title','Careers Page')
@section('content')
<div class="row">


<div class="card container" style="width: 1000px; margin-top:80px;">
    <div class="card-header bg-info"><h4 style="color:#fff;">Career with us</h4></div>
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
    <div class="card-footer">{{$job->links('vendor.pagination.bootstrap-4')}}</div>
</div>

{{-- @endforeach  --}}

</div>

@endsection
{{-- <div class="row">{{$job->links('vendor.pagination.bootstrap-4')}}</div> --}}

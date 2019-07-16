@extends('template.master')
@section('appli','active')
@section('title','My Applications')
@section('content')
<div class="card">
    <div class="card-header"><h4 class="card-header-info">List of My Applications</h4></div>
    <div class="card-body">
    <table class="table table-bordered" id="data-tables">
        <thead>
            <tr align="center"><th>#</th><th>Jobs</th><th>Salary</th><th>Date Apply</th><th>Status</th></tr>
        </thead>
        <tbody>
            @php
            $no=0;
            @endphp
            @foreach ($user as $datauser)
            @foreach ($datauser->jobs as $item)
            @php
            
            if ($item->pivot->status=="unread"){
                $s="btn-info";
                $t="info";
            }elseif ($item->pivot->status=="accept") {
                $s="btn-success";
                $t="success";
            }else{
                $s="btn-danger";
                $t="error";
            }
            @endphp
            
            <tr align="center">
                <td>{{++$no}}</td>
                <td>{{$item->name}}</td>
                <td>{{rupiahFormat($item->salary)}}</td>
                <td>{{formatTanggalLong($item->pivot->created_at)}}</td>
                <td><a href="#" class="btn-sm {{$s}}" onclick="toastr.{{$t}}('{{$item->pivot->message}}');">{{$item->pivot->status}}</a></td>
            </tr>
            @endforeach 
            @endforeach
        </tbody>
    </table>
    </div>
</div>   
@endsection
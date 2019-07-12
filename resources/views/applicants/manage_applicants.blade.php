@extends('template.master')
@section('manageappli','active')
@section('content')
<div class="card">
    <div class="card-header"><h4 class="card-header-info">List Applicants</h4></div>
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr align="center"><th>Name</th><th>Jobs</th><th>Date Apply</th><th>Status</th><th>Download CV</th><th style="width:300px;">Action</th></tr>
        </thead>
        <tbody>

            {{-- {{dd($user)}} --}}
            @foreach ($user as $datauser)
            {{-- @foreach ($datauser->detail_users) --}}
            @foreach ($datauser->jobs as $item)
            <tr align="center">
                <td>{{$datauser->name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->pivot->created_at}}</td>
                <td>{{$item->pivot->status}}</td>
                <td><a href="{{asset($datauser->detail_users->filecv)}}">Download</a></td>
                <td>
                    <a href="{{url('applicants-detail',$datauser->detail_users->user_id)}}" class="btn-sm btn-primary">Detail</a>
                    <a href='#' class="btn-sm btn-success">Process</a>                                        
                </td>
            </tr>
            @endforeach
                
            @endforeach
        </tbody>
    </table>
    </div>
</div>   
@endsection
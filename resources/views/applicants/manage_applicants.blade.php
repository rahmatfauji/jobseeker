@extends('template.master')
@section('manageappli','active')
@section('title','Manage Applicants')
@section('content')
<div class="card">
    <div class="card-header bg-info">
      <div class="nav-tabs-navigation">
        <div class="nav-tabs-wrapper">
            <ul class="nav nav-tabs" data-tabs="tabs">
              <li class="nav-item">
                <a class="nav-link active" href="#unread" data-toggle="tab">
                  <i class="material-icons">assessment</i> Unread
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#accept" data-toggle="tab">
                  <i class="material-icons">assignment_turned_in</i> Accept
                  <div class="ripple-container"></div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#reject" data-toggle="tab">
                  <i class="material-icons">assignment</i> Reject
                  <div class="ripple-container"></div>
                </a>
              </li>
            </ul>
          </div>
      </div>
    </div>
        
  
    
    <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="unread">
                <table class="table table-bordered" id="data-tables">
                    <thead>
                        <tr align="center"><th>Name</th><th>Jobs</th><th>Date Apply</th><th>Status</th>
                            {{-- <th>Download CV</th> --}}
                            <th style="width:300px;">Action</th></tr>
                    </thead>
                    <tbody>
            
                        {{-- {{dd($user)}} --}}
                        @foreach ($user as $datauser)
                        {{-- @foreach ($datauser->detail_users) --}}
                        @foreach ($datauser->jobs_unread as $item)
                        @php
                            if ($item->pivot->status=="unread"){
                                $s="text-dark";
                            }elseif ($item->pivot->status=="accept") {
                                $s="text-success";
                            }else{
                                $s="text-danger";
                            }
                        @endphp
                        <tr align="center">
                            <td>{{$datauser->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{formatTanggalLong($item->pivot->created_at)}}</td>
                            <td><a href="#" class="btn-sm btn-info" onclick="toastr.info('{{$item->pivot->message}}');">{{$item->pivot->status}}</a></td>
                            <td>
                                <a href="{{url('applicants-detail',$datauser->detail_users->user_id)}}" class="btn-sm btn-primary">Detail</a>
                                <a href='{{route('changestatus',[$datauser->detail_users->user_id,$item->id])}}' class="btn-sm btn-success">Process</a>                                        
                            </td>
                        </tr>
                        @endforeach
                            
                        @endforeach
                    </tbody>
                    </table>
              </div>
              <div class="tab-pane" id="accept">
                <table class="table table-bordered" id="data-tables2">
                <thead>
                    <tr align="center"><th>Name</th><th>Jobs</th><th>Date Apply</th><th>Status</th>
                        {{-- <th>Download CV</th> --}}
                        <th style="width:300px;">Action</th></tr>
                </thead>
                <tbody>
        
                    {{-- {{dd($user)}} --}}
                    @foreach ($user as $datauser)
                    {{-- @foreach ($datauser->detail_users) --}}
                    @foreach ($datauser->jobs_accept as $item)
                    @php
                        if ($item->pivot->status=="unread"){
                            $s="text-dark";
                        }elseif ($item->pivot->status=="accept") {
                            $s="text-success";
                        }else{
                            $s="text-danger";
                        }
                    @endphp
                    <tr align="center">
                        <td>{{$datauser->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{formatTanggalLong($item->pivot->created_at)}}</td>
                        <td><a href="#" class="btn-sm btn-success" onclick="toastr.success('{{$item->pivot->message}}');">{{$item->pivot->status}}</a></td>
                        <td>
                            <a href="{{url('applicants-detail',$datauser->detail_users->user_id)}}" class="btn-sm btn-primary">Detail</a>
                            <a href='{{route('changestatus',[$datauser->detail_users->user_id,$item->id])}}' class="btn-sm btn-success">Process</a>                                        
                        </td>
                    </tr>
                    @endforeach
                        
                    @endforeach
                </tbody>
                </table>
              </div>

              <div class="tab-pane" id="reject">
                <table class="table table-bordered" id="data-tables3">
                <thead>
                    <tr align="center"><th>Name</th><th>Jobs</th><th>Date Apply</th><th>Status</th>
                        {{-- <th>Download CV</th> --}}
                        <th style="width:300px;">Action</th></tr>
                </thead>
                <tbody>
        
                    {{-- {{dd($user)}} --}}
                    @foreach ($user as $datauser)
                    {{-- @foreach ($datauser->detail_users) --}}
                    @foreach ($datauser->jobs_reject as $item)
                    <tr align="center">
                        <td>{{$datauser->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{formatTanggalLong($item->pivot->created_at)}}</td>
                        <td><a href="#" class="btn-sm btn-danger" onclick="toastr.error('{{$item->pivot->message}}');">{{$item->pivot->status}}</a></td>
                        <td>
                            <a href="{{url('applicants-detail',$datauser->detail_users->user_id)}}" class="btn-sm btn-primary">Detail</a>
                            <a href='{{route('changestatus',[$datauser->detail_users->user_id,$item->id])}}' class="btn-sm btn-success">Process</a>                                        
                        </td>
                    </tr>
                    @endforeach
                        
                    @endforeach
                </tbody>
                </table> 
              </div>
            </div>
          </div>
</div>   
@endsection
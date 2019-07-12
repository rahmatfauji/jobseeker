@extends('template.master')
@section('appli','active')
@section('content')
<div class="card">
    <div class="card-header"><h4 class="card-header-info">List of My Applications</h4></div>
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr align="center"><th>#</th><th>Jobs</th><th>Date Apply</th><th>Status</th></tr>
        </thead>
        <tbody>

            @php
            $no=0;
            @endphp
            @foreach ($user as $datauser)
            @foreach ($datauser->jobs as $item)
            <tr align="center">
                <td>{{++$no}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->pivot->created_at}}</td>
                <td>{{$item->pivot->status}}</td>
            </tr>
            @endforeach 
            @endforeach
        </tbody>
    </table>
    </div>
</div>   
@endsection
@extends('template.master')
@section('jobs','active')
@section('content')
<div class="card">
        <div class="card-header"><h4 class="card-header-info">List of Jobs</h4></div>
    <div class="card-body">
    <table class="table table-bordered" id="data-tables">
        <thead>
            <tr align="center"><th>#</th><th>Name</th><th>Salary</th><th style="width:100px;">Detail</th></tr>
        </thead>
        <tbody>

            @php
                $i=0;
            @endphp
            @foreach ($job as $item)
                <tr align="center">
                    <td>{{++$i}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->salary}}</td>
                    <td><a href='{{url('detail-job',$item->id)}}' class="btn-sm btn-info">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>   
@endsection
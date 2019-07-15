@extends('template.master')
@section('managejob','active')
@section('title','Manage Job Page')
@section('content')
<div class="card">
    <div class="card-header bg-info"><h4 style="text-transform: uppercase;font-size: 12px;color: #fff;line-height: 24px;font-weight: 500;">List of Jobs</h4></div>
    <div class="card-body">
    <div></div>
    <table class="table table-bordered" id="data-tables">
        <thead>
            <tr align="center"><th>#</th><th>Name</th><th>Posted at</th><th style="width:250px;">Action</th></tr>
        </thead>
        <tbody>

            @php
                $i=0;
            @endphp
            @foreach ($job as $item)
                <tr align="center">
                    <td>{{++$i}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{formatTanggalLong($item->created_at)}}</td>
                    
                    <td>
                    <form method="POST" action="{{route('delete-job',$item->id)}}" id="delete-job-{{$item->id}}">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <a href='{{url('detail-job',$item->id)}}' class="btn-sm btn-success">Detail</a>
                            <a href='{{url('edit-job',$item->id)}}' class="btn-sm btn-primary">Edit</a>    
                            <a class="btn-sm btn-danger" href="#" onclick="
                            event.preventDefault();
                            var check=confirm('yakin ingin hapus data ini???');
                            if(check==true){
                                document.getElementById('delete-job-{{$item->id}}').submit();
                            }else{}">Delete</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="card-footer"><a href="{{url('add-job')}}" class="btn-sm btn-info">&plus;</a></div>
</div>   
@endsection
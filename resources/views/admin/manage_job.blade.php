@extends('template.master')
@section('managejob','active')
@section('content')
<div class="card">
    <div class="card-header"><h4 class="card-header-info">List of Jobs</h4></div>
    <div class="card-body">
    <div></div>
    <table class="table table-bordered" id="data-tables">
        <thead>
            <tr align="center"><th>#</th><th>Name</th><th>Salary</th><th style="width:400px;">Action</th></tr>
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
                    
                    <td>
                    <form method="POST" action="{{route('delete-job',$item->id)}}" id="delete-job-{{$item->id}}">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <a href='{{url('detail-job',$item->id)}}' class="btn-sm btn-info">Detail</a>
                            <a href='{{url('edit-job',$item->id)}}' class="btn-sm btn-info">Edit</a>    
                            <a class="btn-sm btn-info" href="#" onclick="
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
    <div class="card-footer"><a href="{{url('add-job')}}" class="btn-sm btn-primary card-rotate">&plus;</a></div>
</div>   
@endsection
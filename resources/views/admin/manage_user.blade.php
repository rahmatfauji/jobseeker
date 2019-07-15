@extends('template.master')
@section('manageuser','active')
@section('title','Manage User Page')
@section('content')
<div class="card">
    <div class="card-header bg-info"><h4 style="text-transform: uppercase;font-size: 12px;color: #fff;line-height: 24px;font-weight: 500;">List of Users</h4></div>
    <div class="card-body">
    <table class="table table-bordered" id="data-tables">
        <thead>
            <tr align="center"><th>#</th><th  style="width:320px;">Name</th><th>Email</th><th>Role</th><th style="width:100px;">Action</th></tr>
        </thead>
        <tbody>
        @php
        $no=0;    
        @endphp
            {{-- {{dd($user)}} --}}
            @foreach ($user as $item)
                <tr align="center">
                    <td>{{++$no}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->roles->first()->name}}</td>
                    <td>
                        @if ($item->roles->first()->name=='user')
                        <form method="POST" action="{{route('delete-user',$item->id)}}" id="delete-user-{{$item->id}}">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                        <a class="btn-sm btn-danger" href="#" onclick="
                            event.preventDefault();
                            var check=confirm('yakin ingin hapus data ini???');
                            if(check==true){
                                document.getElementById('delete-user-{{$item->id}}').submit();
                            }else{}">Delete</a>
                        </form>    
                        @endif
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>   
@endsection
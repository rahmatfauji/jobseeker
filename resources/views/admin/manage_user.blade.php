@extends('template.master')
@section('manageuser','active')
@section('content')
<div class="card">
    <div class="card-header"><h4 class="card-header-info">List of Users</h4></div>
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr align="center"><th>Name</th><th>Email</th><th>Role</th><th style="width:300px;">Action</th></tr>
        </thead>
        <tbody>

            {{-- {{dd($user)}} --}}
            @foreach ($user as $item)
                <tr align="center">
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->roles->first()->name}}</td>
                    <td>
                        @if ($item->roles->first()->name=='user')
                        <a href='#' class="btn-sm btn-danger">Delete</a>
                        @endif
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>   
@endsection
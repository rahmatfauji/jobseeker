@extends('template.master')
@section('profile','active')
@section('title','Profile Page')
@section('content')


<div class="card">
    <div class="card-header"><h4 class="card-header-info">Detail User</h4></div>
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr><th style="width:250px;">Name</th><td>{{$user->name}}</td></tr>
            <tr><th>Email</th><td>{{$user->email}}</td></tr>
            <tr><th>Address</th><td>{{$user->detail_users->address}}</td></tr>
            <tr><th>City</th><td>{{$user->detail_users->city}}</td></tr>
            <tr><th>Date of Birth</th><td>{{formatTanggal($user->detail_users->birth)}}</td></tr>
            <tr><th>Gender</th><td>{{genderFormat($user->detail_users->gender)}}</td></tr>
            <tr><th>Mobile Phone</th><td>{{$user->detail_users->mobilephone}}</td></tr>
            <tr><th>Educational</th><td>{{$user->detail_users->educational}}</td></tr>
            <tr><th>Curriculum Vitae</th><td><a href="{{asset($user->detail_users->filecv)}}">Download</a></td></tr>
        </thead>
        <tbody>
        <tr><td colspan="2"><a href="{{route('edit-profile')}}"  class="btn btn-info pull-right">Edit</a></td></tr>
        </tbody>
    </table>
    </div>
</div>   
@endsection
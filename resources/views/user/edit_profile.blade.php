@extends('template.master')
@section('profile','active')
@section('content')

{{-- {{$user->detail_users->gender?"M":$m='selected', $f=''?"F":$m='', $f='selected'}} --}}
<form method="POST" action="{{ route('profile-update', $user->id)}}" class="form-horizontal" role="form" enctype="multipart/form-data">
        {{ csrf_field() }} {{method_field('PUT')}}

<div class="card">
    <div class="card-header"><h4 class="card-header-info">Edit Detail</h4></div>
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr><th style="width:250px;">Name</th><td><input type="text" name="name" value="{{$user->name}}" class="form-control"></td></tr>
            <tr><th>Email</th><td><input type="email" name="email" value="{{$user->email}}" class="form-control"></td></tr>
            <tr><th>Address</th><td><input type="text" name="address" value="{{$user->detail_users->address}}" class="form-control"></td></tr>
            <tr><th>City</th><td><input type="text" name="city" value="{{$user->detail_users->city}}" class="form-control"></td></tr>
            <tr><th>Date of Birth</th><td><input type="date" name="birth" value="{{$user->detail_users->birth}}" class="form-control"></td></tr>
            <tr><th>Gender</th><td>
                <select class="form-control" name="gender">
                <option disabled selected>Select here</option>
                <option value="M" {{$m}}>Male</option>
                <option value="F" {{$f}}>Female</option>
                </select></td></tr>
            <tr><th>Mobile Phone</th><td><input type="text" name="mobilephone" value="{{$user->detail_users->mobilephone}}" class="form-control"></td></tr>
            <tr><th>Educational</th><td><input type="text" name="educational" value="{{$user->detail_users->educational}}" class="form-control"></td></tr>
            <tr><th>Curriculum Vitae</th><td><input type="file" name="filecv" value="{{$user->detail_users->filecv}}" class="form-control"></td></tr>
        </thead>
        <tbody>
        <tr><td colspan="2"><button type="submit"  class="btn btn-info pull-right">Update</a></td></tr>
        </tbody>
    </table>
    </div>
</div>
</form>   
@endsection
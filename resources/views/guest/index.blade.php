@extends('template.guest')
@section('title','Guest Page')
@section('content')
<div class="row">

<div class="col-lg-12" style="margin-top:60px;">
<div class="card"  style="background-image:url('{{asset('img/backblue.png')}}')">
    <div class="card-header bg-transparent" style="height:100px;"><h3 class="text-uppercase card-text text-center"></h3></div>
    <div class="card-body" style="height:370px;">
      <h1 class="text-uppercase card-text text-center" style="font-size: 10em">Welcome</h1>
      <p class="text-center">Take what you want, and go !!!</p>      
    </div>
    <div class="card-footer"></div>
</div>
</div>
</div>

@endsection

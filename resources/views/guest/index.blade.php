@extends('template.guest')
@section('title','Welcome Page')
@section('content')
<div class="row">

{{-- <div class="col-lg-12" style="margin-top:60px;"> --}}
<div class="card"  style="background-image:url('{{asset('img/backblue.png')}}');  style=margin-top:60px;">
    <div class="card-header bg-transparent" style="height:100px;"><h3 class="text-uppercase card-text text-center"></h3></div>
    <div class="card-body" style="height:370px;">
      <h1 class="text-uppercase card-text text-center text-secondary">Welcome</h1>
      <p class="text-center">Take what you want, and go !!!</p>      
    </div>
    <div class="card-footer"></div>
</div>
{{-- </div> --}}
</div>

{{-- <div class="card card-blog" style="margin-top:7rem;">
  <div class="card-header card-header-image">
      <a href="#pablo">
      <img class="img" src="{{asset('img/welcome.jpg')}}" rel="nofollow">
          <div class="card-title">
              Our Future Will be Awesome
          </div>
      </a>
  </div>
  <div class="card-body">
      <h6 class="card-category text-info">Fashion</h6>
      <p class="card-description">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
      </p>
      <p class="card-description">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
      </p>
      <p class="card-description">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
      </p>
  </div>
</div> --}}


@endsection

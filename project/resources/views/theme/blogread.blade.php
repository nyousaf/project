@extends('layouts.theme')

@section('main-content')


<section id="work-section" class="work-main-block">
	<div class="container">
		@if($blogs)
	
<div class="card ">
  <div class="card-header">
   	<img src="{{asset('images/blog/'.$blogs->image)}}" style="height: 300px" class="img-fluid card-img-top" alt="{{$blogs->title}}">	
  </div>
  <div class="card-body">
    <h5 class="card-title text-center">{{$blogs->title}}</h5>
    <p class="card-text"data-parent="#accordion">{!! $blogs->details !!}</p>
    <a href="{{ url('/blog') }}"  role="button" class="btn btn-success">Back</a>
  </div>
  
</div>
@endif
</div>
</section>

@endsection
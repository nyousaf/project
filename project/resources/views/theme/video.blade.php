@extends('layouts.theme')
@section('main-content')
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url({{asset('images/banner.jpg')}})">    <div class="overlay-bg"></div>
  	<div class="container">
    	<div class="banner-block">
      		<h2 class="banner-heading">Video</h2>
      		<ol class="breadcrumb">
        		<li><a href="{{url('/')}}">Home</a></li>
        		<li class="active">Video</li>
      		</ol>
    	</div>
  	</div>
</section>
<!--  end page banner -->
<!-- gallery -->        
  <section id="gallery-section" class="gallery-main-block video-section">
    <div class="container">  
      <div class="section text-center">
        <h3 class="section-heading">Video</h3>
        <p>Donec pede justo fringilla vel aliquet nec vulputate eget arcu enim rhoncus dfjdgk djdkd</p>
      </div>   
      @if(isset($video) && count($video)>0)
     	  <div class="row">
          @foreach($video as $key => $item)
            <div class="col-lg-4 gallery-block">            
              <div class="gallery-img">
                <img src="{{asset('images/video/'.$item->image)}}" class="img-responsive" alt="{{$item->title}}">
                <div class="overlay-bg"><a class="popup-youtube" href="{{$item->link}}"><i class="fas fa-play"></i></a></div> 
              </div>           
            </div>
          @endforeach
          {{ $video->links() }} 
        </div>
      @endif
    </div>
</section>
<!--end gallery -->
@endsection
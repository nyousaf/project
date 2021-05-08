@extends('layouts.theme')
@section('main-content')
<!--  page banner -->
{{-- <section id="page-banner" class="banner-main-block" style="background-image: url({{asset('images/banner.jpg')}})">    <div class="overlay-bg"></div>
  	<div class="container">
    	<div class="banner-block">
      		<h2 class="banner-heading">About</h2>
      		<ol class="breadcrumb">
        		<li><a href="{{url('/')}}">Home</a></li>
        		<li class="active">About</li>
      		</ol>
    	</div>
  	</div>
</section> --}}
<!--  end page banner -->
<!-- Map -->
<section id="contact-section" class="contact-main-block">
	<div class="container">
	    <div class="section text-center">
	        <h3 class="section-heading">Get In Touch</h3>  
	        <p>WordPress themes, web templates and more. Brought to you by the community of creatives.</p>
      	</div>
      	<div class="row"> 
        	<div class="col-lg-6">
				<div class="contact-block contact-desc"> 
					<h5 class="contact-block-heading">Contact Us</h5>  
					<ul class="contact-dtl">
            		<li class="contact-icon"><i class="fas fa-map-marker"></i></li>
            		<li>
            		    <h5 class="contact-heading">Address</h5>
            			<p>{{$general->w_address}}</p>
            		</li>
            	</ul>
            	<ul class="contact-dtl">
            		<li class="contact-icon"><i class="fas fa-phone"></i></li>
            		<li>
            		    <h5 class="contact-heading">Phone</h5>   
            			<p><a href="tel:{{$general->w_phone}}">{{$general->w_phone}}</a></p>
            		</li>
            	</ul>
            	<ul class="contact-dtl">
            		<li class="contact-icon"><i class="fas fa-envelope"></i></li>
            		<li>
            		    <h5 class="contact-heading">Mail</h5>
            			<p><a href="mailto:{{$general->w_email}}?Subject=Hello%20again" target="_top">{{$general->w_email}}</a></p>
            		</li>
            	</ul>
            	<ul class="contact-dtl">
            		<li class="contact-icon"><i class="fas fa-clock"></i></li>
            		<li>
            		    <h5 class="contact-heading">Timing</h5>
            			<p>{{$general->w_time}}</a>
            		</li>
            	</ul>
          </div> 
      </div>    
    	<div class="col-lg-6">
     		<div class="contact-block message-form">          			
					<h5 class="contact-block-heading">Send Your Enquiry</h5>  
      		<form id="contact-form" action="{{ action('PageController@contact_post') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="w_email" value="info@arterea.com">
          	<div class="form-group">
              <input type="text" class="form-control" id="name-contact" name="name" placeholder="Your Name*" required>
          	</div> 
          	<div class="form-group">
            	<input type="text" class="form-control" id="phone-contact" name="phone" placeholder="Phone*" required>
          	</div>
          	<div class="form-group">
            	<input type="text" class="form-control" id="email-contact" name="email" placeholder="Your Email*" required>
          	</div> 
          	<div class="form-group">           
            	<textarea id="comment" class="form-control" name="message" placeholder="Your Message" required></textarea>
          	</div>
        		<div><button class="btn btn-primary" type="submit">Send Message</button></div>
      		</form>
  			</div>
			</div>
  	</div>  
  </div>
</section>
<!--  end contact -->
<!-- Map -->
<section id="map-section" class="map-main-block">
    <div id="map-location" class="map-location-block"></div>
</section>
<!--  end map -->
@endsection
@section('custom-script')
<script>
  $(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
  });
  function initialize(){
    var myLatLng = {lat: 37.970996, lng:  23.730542}; // Insert Your Latitude and Longitude For Footer Wiget Map
    var mapOptions = {
      center: myLatLng, 
      zoom: 15,
      disableDefaultUI: true,
      scrollwheel: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP    
    }
    // For Footer Widget Map
    var map = new google.maps.Map(document.getElementById("map-location"), mapOptions);
    // var image = 'images/icons/map-marker.png';
    var beachMarker = new google.maps.Marker({
      position: myLatLng, 
      map: map,   
      title: 'ARTEREA'
      // icon: image
    });    
  }
</script>
@endsection
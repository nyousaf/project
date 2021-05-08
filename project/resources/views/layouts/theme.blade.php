<!DOCTYPE html>


<html lang="en">
<!-- <![endif]-->
<!-- head -->
<head>
<title>{{$general->w_title ? $general->w_title : ''}}</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="{{$general->desc ? $general->desc : ''}}" />
<meta name="keywords" content="{{$general->keywords ? $general->keywords : ''}}">
@yield('custom-meta')
<meta name="author" content="Media City" />
<meta name="MobileOptimized" content="320" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" type="image/icon" href="{{asset('images/favicon/'.$general->favicon)}}"> <!-- favicon-icon -->
<!-- theme styles -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
 <!-- font awesome css -->
<link href="{{asset('vendor/flaticon/css/flaticon.css')}}" rel="stylesheet" type="text/css"/> <!-- font awesome css -->
<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
 <!-- google fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.css" type="text/css" /> <!-- summernote css -->
<link rel="stylesheet" href="{{ asset("vendor/fontawesome/css/font-awesome.css") }}">
<link href="{{asset('css/menumaker.css')}}" rel="stylesheet" type="text/css"/> <!-- menu css -->
<link href="{{asset('css/select2.css')}}" rel="stylesheet" type="text/css"/> <!-- select2 css -->
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>

<link href="{{asset('vendor/owlcarousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
 <!-- custom css -->
<!-- end theme styles -->
</head>

<script>
  window.Laravel =  <?php echo json_encode([
      'csrfToken' => csrf_token(),
  ]); ?>
</script>
<!-- end head --> 
<!-- body start-->
<body>
	<div>
	  @include('flash::message')
	</div>
	@if($general->is_preloader == 1)
		<!-- preloader --> 
	  <div class="preloader">
      <div class="status">
        <div class="status-message">
        </div>
      </div>
  	</div>
	@endif
  <!-- end preloader -->
<!--  navigation --> 
<header class="nav-bar navbar-default">
  <div class="container-fluid">
  	<div class="row">        
    	<div class="col-lg-2">
    		<div class="logo">
      		<a href="{{url('/')}}" title="">
					  @if($general->logo != Null)
							<img src="{{ asset('images/logo/'.$general->logo) }}" alt="logo">
					  @else
		      		{{$general->w_name ? $general->w_name : 'Logo'}}
		      		<p>Photos For Everyone</p>
					  @endif
					</a>
    		</div>
      </div>
      <div class="col-lg-10">
      	<div class="row no-gutters">
      		<div class="col-md-5">
						@if(!Request::is('/'))
							{!! Form::open(['method' => 'GET', 'action' => 'SearchController@homeSearch', 'class' => 'search-form search-form-2']) !!}
							{!! Form::text('search', null, ['class' => 'search-input', 'placeholder' => 'Search']) !!}
						  	<button type="submit" class="search-button"><i class="fa fa-search"></i></button>
					  	{!! Form::close() !!} 
						@endif
					</div>
      		<div class="col-md-7">
		      	<div class="navigation-menu float-right">
		        	<div id="cssmenu">
		            <ul>  
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Categories
							</a>
							<div style="padding:15px;" class="dropdown-menu" aria-labelledby="navbarDropdown">
	                       <input value='{{$count=1}}'    hidden/>
								
							@foreach(App\Category::all() as $cat)
							
							@if($count<=8)
							<a class="dropdown-item" href="{{ url('category/'.$cat->slug) }}">{{ $cat->title }}</a>
							<div class="dropdown-divider"></div>
							<input value='{{$count++}}'    hidden/>
							@else
							<a class="dropdown-item" href="{{ url('/category') }}">Show All...</a>
							@break
							@endif
							@endforeach
							</div>
						</li>
						   
			            	
			            	@auth
			            	 @if($auth->suspended  == 1)
						    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Your Account Is  <strong>Suspended</strong> !!!!
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                           </div>
			                <li class="login"><a href="{{ route('logout') }}"
										onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										Logout
									</a></li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
									</form>
			            	 
			            	@else
		            		<li><a href="{{ url('user/account') }}" title="My Account"><i class="fa fa-user"></i> {{strtok($auth->name,' ')}}</a></li>
							
		            		<li class="login"><a href="{{ route('logout') }}"
										onclick="event.preventDefault();
												 document.getElementById('logout-form').submit();">
										Logout
									</a></li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
									</form>
									 @endif
		            	@else
		            		<li><a href="{{route('login')}}">Login</a></li>
			            	<li><a href="{{route('register')}}">Signup</a></li>

			            @endauth

			            <!-- <li class="nav-item dropdown" ><br>
							   <span class="nav-link fa fa-ellipsis-v" data-toggle="dropdown" style="font-size: 20px;
    font-weight: normal; margin-right: 5px;"></span>

							<div style="padding:15px;" class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ url('/mostviewed') }}">Most Viewed</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ url('/mostcommented') }}">Most Commented</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ url('/authors') }}">Authors</a>
							@if(isset($settings) && $settings->is_blog)	
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ url('/blog') }}">Blog</a>
							@endif
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ url('/faq') }}">FAQ</a>
							</div>
						</li> -->
@auth
 @if($auth->suspended  == 0)
<li><br><button  class="btn btn-info"><a style="color: white;" href="{{route('upload.create')}}">Upload</a></button></li>
@endif
@endauth

		       </ul>
		        	</div>
				    </div>
				  </div>
				</div>
     	</div>
    </div>
  </div>
</header>  
<!--  end navigation -->
@yield('main-content')
<!-- subsctibe start -->
<!-- @if(isset($settings) && $settings->is_mailchimp)	
	<section id="subscribe" class="subscribe-main-block">
	  <div class="container-fluid">
			<h4 class="subscribe-heading">Get the latest Updates</h4>	
			{!! Form::open(['method' => 'POST', 'action' => 'EmailSubscribeController@subscribe', 'id' => 'subscribe-form', 'class' => 'subscribe-form']) !!}
      	{{ csrf_field() }}
				<div class="form-group">
          <label class="sr-only">Your Email address</label>
          <input type="email" class="form-control" id="mc-email" placeholder="Enter email address">
					<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        	<label for="mc-email"></label>
				</div>
	  	{!! Form::close() !!}
    </div>
  </section>
@endif -->
<!-- subsctibe end -->
<!-- footer start -->
<!-- @if($settings->footer_layout == 0)
	<footer id="footer" class="footer-section footer-one dark-black-bg">
		<div style="height: 0px">
	  	<a id="back2Top" title="Back to top" href="#">&#10148;</a>
	  </div>
	  <div class="container-fluid">
		  <div class="footer-block text-center">
		  	 @if(isset($social) && count($social)>0)
			  	<div class="footer-social">
			  		<div class="follow-heading">Follow us on</div>
						<ul>
							@foreach($social as $item)
								<li class="{{strtolower($item->title)}}"><a href="{{$item->url}}" target="_blank" title="{{$item->title}}"><i class="{{$item->icon}}"></i></a></li>
							@endforeach
						</ul>
					</div>
				@endif
		  	<div class="app-icon">
			  	<ul>
	        	@if(isset($settings) && $settings->is_playstore)
	          	<li><a href="{{$settings->playstore_link}}" target="_blank" title="Google Play"><img src="{{asset('images/google-play.png')}}" class="img-fluid" alt="Google Play"></a></li>
	        	@endif
	        	@if(isset($settings) && $settings->is_app_icon)
	          	<li><a href="{{$settings->app_link}}" target="_blank" title="Apple App Store"><img src="{{asset('images/app-store.png')}}" class="img-fluid" alt="Apple App Store"></a></li>
	        	@endif
	        </ul>
	      </div>
		    <div class="useful-links">
		    	<ul>
			      @foreach($f_menu as $item)														
			    		@if($item->widget == 3)	
								<li><a href="{{url($item->slug)}}" target="_blank" title="{{$item->title}}">{{$item->title}}</a></li>
							@endif
						@endforeach
					</ul>
		    </div>
		    <div class="block-border"></div>
		    <div class="footer-copyright">
				  <span>&copy; <?php echo date("Y"); ?><a href="{{url('/')}}" title=""> {{$general->w_name}}</a>. | {{$general->copyright}}</span>
				</div>	
		  </div>
		</div>
	</footer>
@else
	<footer id="footer" class="footer-main-block footer-two dark-black-bg">
		<div style="height: 0px">
	  	<a id="back2Top" title="Back to top" href="#">&#10148;</a>
	  </div>
	  <div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="footer-widget link-widget">
					  <div class="footer-logo">
							<a href="{{url('/')}}">
							  @if($general->footer_logo != Null)
									<img src="{{ asset('images/'.$general->footer_logo) }}" alt="logo">
							  @else
									{{$general->w_name ? $general->w_name : 'Logo'}}
							  @endif
							</a>
					  </div>
					  <div class="footer-about">{{$general->footer_text}}</div>
					  @if(isset($social) && count($social)>0)
					  	<div class="social-icon footer-social">
								<ul>
									@foreach($social as $item)
										<li class="{{strtolower($item->title)}}-icon"><a href="{{$item->url}}" target="_blank" title="{{$item->title}}"><i class="{{$item->icon}}"></i></a></li>
									@endforeach
								</ul>
							</div>
						@endif
					</div>
			  </div>
			  <div class="col-lg-2">
					<div class="footer-widget link-widget">
					  <h6 class="footer-widget-heading">{{$general->f_title2}}</h6>
					  @if(isset($f_menu))	
							<ul>
								@foreach($f_menu as $item)														
	            		@if($item->widget == 2)	
										<li><a href="{{url($item->slug)}}" target="_blank" title="{{$item->title}}">{{$item->title}}</a></li>
									@endif
								@endforeach
							</ul>
						@endif
					</div>
			  </div>
			  <div class="col-lg-2">
					<div class="footer-widget link-widget">
					  <h6 class="footer-widget-heading">{{$general->f_title3}}</h6>
					  @if(isset($f_menu))	
							<ul>
								@foreach($f_menu as $item)														
	            		@if($item->widget == 3)	
										<li><a href="{{url($item->slug)}}" target="_blank" title="{{$item->title}}">{{$item->title}}</a></li>
									@endif
								@endforeach
							</ul>
						@endif
					</div>
			  </div>
			  <div class="col-lg-3">
					<div class="footer-widget contact-widget">
					  <h6 class="footer-widget-heading">{{$general->f_title4}}</h6>
						<ul class="contact-widget-dtl"> 
						  <li><i class="fa fa-map-marker"></i> {{$general->w_address}}</li>
						</ul>
						<ul class="contact-widget-dtl">  						  	
						  <li><i class="fa fa-phone"></i> <a href="tel:{{$general->w_phone}}">{{$general->w_phone}}</a></li>
						</ul>
						<ul class="contact-widget-dtl">						  
						  <li><i class="fa fa-envelope"></i> <a href="mailto:{{$general->w_email}}?Subject=Hello%20again" target="_top">{{$general->w_email}}</a></li>	
						</ul>
					</div>
			  </div>
			</div>
			<div class="border-divider">
			</div>
			<div class="row">
			  <div class="col-lg-12 text-center">
					<div class="footer-copyright">
					  <span>&copy; <?php echo date("Y"); ?><a href="{{url('/')}}" title=""> {{$general->w_name}}</a>. | {{$general->copyright}}</span>
					</div>
			  </div>
			</div>
	  </div>
	</footer>
@endif
footer end -->
<!-- jquery -->
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script> <!-- jquery library js -->
<script type="text/javascript" src="{{asset('js/bootstrap.bundle.js')}}"></script> <!-- bootstrap js -->
<script src="{{asset('vendor/owlcarousel/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/masonry/masonry.pkgd.js')}}"></script> <!-- masonry js -->
<script src="{{asset('vendor/summernote/js/summernote-bs4.min.js')}}"></script> <!-- summernote js --> 
<script type="text/javascript" src="{{asset('js/imagesloaded.pkgd.js')}}"></script> <!-- masonry js -->
<script type="text/javascript" src="{{asset('js/select2.js')}}"></script> <!-- select2 js -->
<script type="text/javascript" src="{{asset('js/theme.js')}}"></script> <!-- custom js -->



<script>
$(document).ready(function(){
	var id=null;var filename=null;
	$('body').on('click', '.img-download', function(e){
		// event.preventDefault();
	  var self = $(this),
		id = self.data('id');
		$.ajax({
	  	headers: {
	  	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
	    type: 'GET',
	    url: "{{ url('counter') }}",
	    data: {id: id},
	    success: function (data) {	      
	  		console.log(data); 	 
  		},
  		error: function(XMLHttpRequest, textStatus, errorThrown) {
	      console.log(XMLHttpRequest);
	    }
		}).done(function(data) {
   		self.find('span').text(data);	 
		}).fail(function() {
		  alert( "We are facing some issues currenlty. Please try again later." );
		})
	});

	var urlLike = '{{ url('phvote') }}';
	var photoId=null;var status=null;
	$('[data-like]').on('click', function(e) {

	    e.preventDefault();
		  var self = $(this),
		  photoId = self.data('like');
		  if(self.hasClass('active')){
		  	status = 'active';
		  }   
		  else{
		  	status = 'not';
		  }  
		  console.log(status);
		  $.ajax({
	    	headers: {
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
	      type: "POST",
	      url: urlLike,
	      data: {photoId: photoId, status: status},
		    success: function (data) {	      
			  		console.log(data);  
		  		},
		  	error: function(e){
		  		console.log(e);
		  	}
		  }).done(function(data) {
		  	self.find('span').html(data);
		    if (self.hasClass('active')) {
	      	self.removeClass('active');
		    }
		    else {
		     	self.addClass('active');
		    }
		  }).fail(function() {
			  alert( "We are facing some issues currenlty. Please try again later." );
			})
		});

	var urlFav = '{{ url('favorite') }}';
	var photoId=null;var status=null;
	$('[data-fav]').on('click', function(e) {
	    e.preventDefault();
		  var self = $(this),
		  photoId = self.data('fav');
		  if(self.hasClass('active')){
		  	status = 'active';
		  }   
		  else{
		  	status = 'not';
		  }  
		  console.log(photoId);
		  $.ajax({
	    	headers: {
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
	      type: "POST",
	      url: urlFav,
	      data: {photoId: photoId, status: status},
		    success: function (data) {	      
			  		console.log(data);  
		  		},
		  	error: function(e,r,t){
		  		console.log(e)
		  	}
		  }).done(function(data) {
		  	self.find('span').html(data);
		    if (self.hasClass('active')) {
	      	self.removeClass('active');
		    }
		    else {
		     	self.addClass('active');
		    }
		  }).fail(function() {
			  alert( "We are facing some issues currenlty. Please try again later." );
			})
		});
});
</script>
@if($general->right_click == 1)
  <script type="text/javascript" language="javascript">
   // Right click disable 
    $(function() {
	    $(this).bind("contextmenu", function(inspect) {
	    	inspect.preventDefault();
	    });
    });
      // End Right click disable 
  </script>
@endif
@if($general->inspect == 1)
<script type="text/javascript" language="javascript">
//all controller is disable 
  $(function() {
	  var isCtrl = false;
	  document.onkeyup=function(e){
		  if(e.which == 17) isCtrl=false;
		}
		document.onkeydown=function(e){
		  if(e.which == 17) isCtrl=true;
		  if(e.which == 85 && isCtrl == true) {
			  return false;
			}
	  };
    $(document).keydown(function (event) {
      if (event.keyCode == 123) { // Prevent F12
        return false;
  		} 
      else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
	     	return false;
	   	}
 		});  
	});
  // end all controller is disable 
 </script>
@endif
@if($general->is_gotop==1)
	<script type="text/javascript">
	 //Go to top
	$(window).scroll(function() {
	  var height = $(window).scrollTop();
	  if (height > 100) {
	      $('#back2Top').fadeIn();
	  } else {
	      $('#back2Top').fadeOut();
	  }
	});
	$(document).ready(function() {
	  $("#back2Top").click(function(event) {
	      event.preventDefault();
	      $("html, body").animate({ scrollTop: 0 }, "slow");
	      return false;
	  });
	});
	// end go to top 
	</script>
@endif
@if($general->google_id)
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '{{$general->google_id}}', 'auto');
  ga('send', 'pageview');
</script>
@endif
@if($general->fb_pixel)
<!-- facebook -->
<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	// Insert Your Facebook Pixel ID below. 
	fbq('init', '{{$general->fb_pixel}}');
	fbq('track', 'PageView');
</script>
<!--End  facebook -->
@endif
@yield('custom-scripts')
<!-- end jquery -->
</body>
<!-- body end -->
</html>

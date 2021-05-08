<!DOCTYPE html>
<!--
**********************************************************************************************************
	Copyright (c) 2018 .
**********************************************************************************************************  -->
<!-- 
Template Name: 
Version: 1.0.0
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js')}}"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js')}}"> <![endif]-->
<!--[if !IE]> -->
<html lang="en">
<!-- <![endif]-->
<!-- head -->
<head>
<title></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="" />
<meta name="keywords" content="">
<meta name="author" content="Media City" />
<meta name="MobileOptimized" content="320" />
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="icon" type="image/icon" href="<?php echo e(asset('images/favicon/favicon.ico')); ?>"> <!-- favicon-icon -->
<!-- theme styles -->
<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
<link href="<?php echo e(asset('vendor/fontawesome/css/fontawesome-all.css')); ?>" rel="stylesheet" type="text/css"/> <!-- font awesome css -->
<link href="<?php echo e(asset('vendor/flaticon/css/flaticon.css')); ?>" rel="stylesheet" type="text/css"/> <!-- font awesome css -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet"> <!-- google fonts -->
<link href="<?php echo e(asset('vendor/owl/css/owl.carousel.css')); ?>" rel="stylesheet" type="text/css"/> <!-- owl carousel css -->
<link href="<?php echo e(asset('vendor/magnific/css/magnific-popup.css')); ?>" rel="stylesheet" type="text/css"/> <!-- magnify popup css -->
<link href="<?php echo e(asset('css/menumaker.css')); ?>" rel="stylesheet" type="text/css"/> <!-- menu css -->
<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css"/> <!-- custom css -->
<!-- end theme styles -->
</head>

<script>
  window.Laravel =  <?php echo json_encode([
      'csrfToken' => csrf_token(),
  ]); ?>
</script>
<!-- end head -->
<!-- preloader --> 
<!--   <div class="preloader">
	<div class="status">
	  <div class="status-message">
	  </div>
	</div>
  </div> -->
<!-- end preloader --> 
<!-- body start-->
<body>
	<div>
		  <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
<section class="top-bar hidden-xs">
	<div class="container">
		<div class="row">
		  <div class="col-lg-6">
			  <div class="top-title">
				<a href="mailto:<?php echo e($general->w_email); ?>?Subject=Hello%20again" target="_top"><?php echo e($general->w_email); ?></a>
			</div>
		  </div>
		  <div class="col-lg-6">
			  <div class="social-icon">
				<ul>
				  <?php if($general->fb_url): ?>
					<li><a href="<?php echo e($general->fb_url); ?>" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
				  <?php endif; ?>
				  <?php if($general->twi_url): ?>
					<li><a href="<?php echo e($general->twi_url); ?>" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a></li>
				  <?php endif; ?>
				  <?php if($general->g_url): ?>
					<li><a href="<?php echo e($general->g_url); ?>" target="_blank" class="google-plus"><i class="fab fa-google-plus-g"></i></a></li> 
				  <?php endif; ?>
				  <?php if($general->link_url): ?>                             
					<li><a href="<?php echo e($general->link_url); ?>" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i></a></li>
				  <?php endif; ?>
				  <?php if($general->utube_url): ?>
					<li><a href="<?php echo e($general->utube_url); ?>" target="_blank" class="youtube"><i class="fab fa-youtube"></i></a></li>
				  <?php endif; ?>
				</ul>
			  </div>
		  </div>
		</div>
	</div>
</section> 
<!--  end top bar -->
<!--  navigation -->
<header class="nav-bar navbar-default">
	<div class="container">
		<div class="row">        
		  <div class="col-lg-2">
			  <div class="logo">
				<a href="<?php echo e(url('/')); ?>">
				  <?php if($general->logo != Null): ?>
						<img src="<?php echo e(asset('images/'.$general->logo)); ?>" alt="logo">
				  <?php else: ?>
						<?php echo e($general->w_name); ?>

				  <?php endif; ?>
				</a>
			  </div>
		  </div>
		  <div class="col-lg-7">
			  <div class="navigation-menu">
				<div id="cssmenu">
				  <ul>            
					  <li><a href="<?php echo e(url('/')); ?>" class="active">Home</a></li>
					  <li><a href="<?php echo e(url('about')); ?>">About</a></li>
					  <li><a href="<?php echo e(url('work')); ?>">Work</a></li>
					  <li><a href="<?php echo e(url('video')); ?>">Video</a></li>
					  <li><a href="<?php echo e(url('gallery')); ?>">Gallery</a></li>
					  <li><a href="<?php echo e(url('sale')); ?>">Sale</a></li>
					  <li><a href="<?php echo e(url('contact')); ?>">Contact</a></li>
				  </ul>
			  </div>
		  </div>
		  </div>
		  <div class="col-lg-3">
			 	
				<?php echo Form::open(['method' => 'GET', 'action' => 'SearchController@homeSearch', 'class' => 'search-form']); ?>

					<?php echo Form::text('search', null, ['class' => 'search-input', 'placeholder' => 'Search']); ?>

				  <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
			  <?php echo Form::close(); ?>

		  </div>  
	  </div>
	</div>
</header>  
<!--  end navigation -->
<?php echo $__env->yieldContent('main-content'); ?>
<!-- subsctibe start -->
<!-- <section id="subscribe" class="subscribe-main-block">
  <div class="container">
	<div class="subscribe-dtl">
			<h4 class="subscribe-heading">Subscribe For Latest Updates</h4>
			<form id="subscribe-form" class="form-style subscribe-form">
				<div class="input-group">
					<label class="sr-only">Email Here</label>
					<input class="form-control" id="mc-email" placeholder="Email Here.." type="email">
					<button type="submit" class="btn btn-default">Go</button>
				</div>               
				<label for="mc-email"></label>
			</form>
		</div>
	</div>
</section> -->
<!-- end subscribe -->
<!-- footer start -->
<footer id="footer" class="footer-main-block dark-black-bg">
  <div class="container">
		<div class="row">
			  <div class="col-lg-4">
				<div class="footer-widget link-widget">
				  <div class="footer-logo">
					<a href="<?php echo e(url('/')); ?>">
					  <?php if($general->logo != Null): ?>
						<img src="<?php echo e(asset('images/'.$general->logo)); ?>" alt="logo">
					  <?php else: ?>
						<?php echo e($general->w_name); ?>

					  <?php endif; ?>
					</a>
				  </div>
				  <div class="footer-about"><?php echo e($general->footer_text); ?></div>
				</div>
		  </div>
		  <div class="col-lg-2">
				<div class="footer-widget link-widget">
				  <h6 class="footer-widget-heading">Useful Links</h6>
				  <ul>
					<li><a href="about.html" target="_blank" title="">About</a></li>
					<li><a href="work.html" target="_blank" title="">Work</a></li>
					<li><a href="gallery.html" target="_blank" title="">Gallery</a></li>
					<li><a href="sale.html" target="_blank" title="">Sale</a></li>
				  </ul>
				</div>
		  </div>
		  <div class="col-lg-2">
				<div class="footer-widget link-widget">
				  <h6 class="footer-widget-heading">Help</h6>
				  <ul>
					<li><a href="#" target="_blank" title="">Community</a></li>
					<li><a href="#" target="_blank" title="">Blog</a></li>
					<li><a href="#" target="_blank" title="">Forum</a></li>
					<li><a href="#" target="_blank" title="">Meetup</a></li>
				  </ul>
				</div>
		  </div>
		  <div class="col-lg-3">
				<div class="footer-widget contact-widget">
				  <h6 class="footer-widget-heading">Contact Us</h6>
					<ul class="contact-widget-dtl">                   
					  <li><i class="fas fa-map-marker"></i></li>
					  <li><?php echo e($general->w_address); ?></li>
					</ul>
					<ul class="contact-widget-dtl">  
					  <li><i class="fas fa-phone"></i></li>		
					  <li><a href="tel:<?php echo e($general->w_phone); ?>"><?php echo e($general->w_phone); ?></a></li>
					</ul>
					<ul class="contact-widget-dtl">  
					  <li><i class="fas fa-envelope"></i></li>
					  <li><a href="mailto:<?php echo e($general->w_email); ?>?Subject=Hello%20again" target="_top"><?php echo e($general->w_email); ?></a></li>	
					</ul>
				</div>
		  </div>
		</div>
		<div class="border-divider">
		</div>
		<div class="row">
		  <div class="col-lg-6">
				<div class="footer-copyright">
				  <span>&copy; <?php echo date("Y"); ?><a href="<?php echo e(url('/')); ?>" title=""> <?php echo e($general->w_name); ?></a>. | <?php echo e($general->copyright); ?></span>
				</div>
		  </div>
		  <div class="col-lg-6">
				<div class="social-icon footer-social">
				  <ul>              
						<?php if($general->fb_url): ?>
						  <li><a href="<?php echo e($general->fb_url); ?>" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
						<?php endif; ?>
						<?php if($general->twi_url): ?>
						  <li><a href="<?php echo e($general->twi_url); ?>" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a></li>
						<?php endif; ?>
						<?php if($general->g_url): ?>
						  <li><a href="<?php echo e($general->g_url); ?>" target="_blank" class="google-plus"><i class="fab fa-google-plus-g"></i></a></li> 
						<?php endif; ?>
						<?php if($general->link_url): ?>                             
						  <li><a href="<?php echo e($general->link_url); ?>" target="_blank" class="linkedin"><i class="fab fa-linkedin"></i></a></li>
						<?php endif; ?>
						<?php if($general->utube_url): ?>
						  <li><a href="<?php echo e($general->utube_url); ?>" target="_blank" class="youtube"><i class="fab fa-youtube"></i></a></li>
						<?php endif; ?>
				  </ul>
				</div>
		  </div>
		</div>
  </div>
</footer>
<!-- footer end -->
<!-- jquery -->
<script type="text/javascript" src="<?php echo e(asset('js/jquery-3.3.1.min.js')); ?>"></script> <!-- jquery library js -->
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.bundle.js')); ?>"></script> <!-- bootstrap js -->
<script type="text/javascript" src="<?php echo e(asset('vendor/owl/js/owl.carousel.js')); ?>"></script> <!-- owl carousel js -->
<script type="text/javascript" src="<?php echo e(asset('vendor/owl/js/owl.carousel2.thumbs.js')); ?>"></script> <!-- owl carousel js -->
<script type="text/javascript" src="<?php echo e(asset('vendor/masonry/masonry.pkgd.js')); ?>"></script> <!-- masonry js -->
<script type="text/javascript" src="<?php echo e(asset('js/imagesloaded.pkgd.js')); ?>"></script> <!-- masonry js -->
<script type="text/javascript" src="<?php echo e(asset('vendor/magnific/js/magnific-popup.min.js')); ?>"></script> <!-- magnify popup js --> 
<script type="text/javascript" src="<?php echo e(asset('js/theme.js')); ?>"></script> <!-- custom js -->
<script>
$(document).ready(function(){
	var id=null;
$('body').on('click', '.like-btn a', function(e){
		event.preventDefault();
	  var self = $(this),
		id = self.data('id');
		$.ajax({
	  	headers: {
	  	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
	    type: 'GET',
	    url: "<?php echo e(url('counter')); ?>",
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
});
</script>
<?php echo $__env->yieldContent('custom-scripts'); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html>
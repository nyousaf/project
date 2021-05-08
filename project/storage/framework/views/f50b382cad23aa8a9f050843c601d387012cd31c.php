<?php $__env->startSection('main-content'); ?>
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">    <div class="overlay-bg"></div>
	<div class="container">
	  <div class="banner-block">
		  <h2 class="banner-heading">About</h2>
		  <ol class="breadcrumb">
			<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
			<li class="active">About</li>
		  </ol>
	  </div>
	</div>
</section>
<!--  end page banner -->
<!-- about -->
<section id="about-section" class="about-main-block">
  <div class="container">
	<div class="row">
	  <div class="col-lg-7">        
		<h2 class="about-heading">Success Is What We Hope For !!</h2>
		<div class="about-block">
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non varius nisl. Morbi lacinia eros a nulla pharetra, id sollicitudin felis tempus. Aenean at ex viverra nunc rhoncus volutpat. Nulla pharetra ante leo. Donec sit amet imperdiet odio, vel aliquam lectus. Nunc vehicula, mauris fermentum pulvinar vestibulum, dui tortor fringilla urna, nec pellentesque lacus purus eget ante. Maecenas imperdiet magna porta diam pulvinar ullamcorper at a felis.</p>
		  <p>Vivamus ac auctor ex. Aenean eleifend sit amet lorem nec dapibus. Ut aliquet massa vitae efficitur viverra. Cras enim justo, laoreet sit amet iaculis ut, pretium sed tortor. In tristique risus vel est tincidunt molestie. Vivamus ornare consequat sollicitudin. Cras semper in odio vitae semper. Pellentesque eget consequat ex. Sed hendrerit ipsum eget condimentum suscipit. Cras semper in odio vitae semper. Pellentesque eget consequat ex. Sed hendrerit ipsum eget condimentum suscipit.</p>
		</div>
	  </div>
	  <div class="col-lg-5">
		<div class="row">
		  <div class="col-lg-6 about-img">
			<div class="about-gallery">           
			  <img src="<?php echo e(asset('images/about/about-01.jpg')); ?>" class="img-fluid" alt="">
			</div>
		  </div>
		  <div class="col-lg-6 about-img">            
			<div class="about-gallery">           
			  <img src="<?php echo e(asset('images/about/about-02.jpg')); ?>" class="img-fluid" alt="">
			</div>
		  </div>
		  <div class="col-lg-6 about-img">            
			<div class="about-gallery">           
			  <img src="<?php echo e(asset('images/about/about-03.jpg')); ?>" class="img-fluid" alt="">
			</div>
		  </div>
		  <div class="col-lg-6 about-img">            
			<div class="about-gallery">           
			  <img src="<?php echo e(asset('images/about/about-04.jpg')); ?>" class="img-fluid" alt="">
			</div>
		  </div>
		</div>
	  </div>
	</div>    
  </div>
</section>
<!-- end about -->
<!--  facts -->
  <section id="facts" class="facts-section">
	<div class="parallax" style="background-image: url('images/facts-bg.jpg')">
		<div class="overlay-bg"></div>
		<div class="container">
		  <div class="row">
			  <div class="col-sm-3 col-xs-6">
				<div class="facts-block">             
					<div class="facts-icon"><i class="flaticon-clock"></i></div>
					<div class="facts-dtl">
					  <h3 class="facts-number"><span class="counter">25</span>+</h3>
					  <p>Experience</p>
					</div> 
				</div>
			  </div>
			  <div class="col-sm-3 col-xs-6">
				<div class="facts-block">             
					<div class="facts-icon"><i class="flaticon-avatar"></i></div>
					<div class="facts-dtl">
					  <h3 class="facts-number"><span class="counter">1000</span>+</h3>
					  <p>Customers</p>
					</div> 
				</div>
			  </div>
			  <div class="col-sm-3 col-xs-6">
				<div class="facts-block">             
					<div class="facts-icon"><i class="flaticon-paint-brush"></i></div>
					<div class="facts-dtl">
					  <h3 class="facts-number"><span class="counter">108</span>+</h3>
					  <p>Products</p>
					</div> 
				</div>
			  </div>
			  <div class="col-sm-3 col-xs-6">
				<div class="facts-block">             
					<div class="facts-icon"><i class="flaticon-trophy"></i></div>
					<div class="facts-dtl">
					  <h3 class="facts-number"><span class="counter">25</span>+</h3>
					  <p>Awards</p>
					</div> 
				</div>
			  </div>
		  </div>
		</div>
	</div>
</section>
<!-- end facts -->
<!--  testimonial -->
<section id="testimonial" class="testimonial-main-block">
	<?php if(isset($testimonial) && count($testimonial)>0): ?>
		<div class="container">  
			<div class="section text-center">      
			  <h2 class="section-heading">Testimonial</h2>
			  <p>Vivamus ac auctor ex. Aenean eleifend sit amet lorem nec dapibus. Ut aliquet massa vitae efficitur viverra.</p>
			</div>
			<div id="testimonial-slider" class="testimonial-slider owl-carousel">
				<?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="item">  
					  <div class="client-block">                  
						  <p><i class="fas fa-quote-left"></i><?php echo e($item->desc); ?><i class="fas fa-quote-right"></i></p>
							<div class="client-img">
							<img src="<?php echo e(asset('images/testimonial/'.$item->image)); ?>" class="img-responsive" alt="client-img-1">
						</div>
						  <div class="client-dtl">
							  <div class="client-name"><?php echo e($item->title); ?></div> 
							  <div class="client-post"><?php echo e($item->designation); ?></div>
						  </div>
					  </div>            
				  </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>	
	<?php endif; ?>
</section> 
<!-- end testimonial two -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('main-content'); ?>
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">    <div class="overlay-bg"></div>
	<div class="container">
		<div class="banner-block">
			<h2 class="banner-heading">Sale</h2>
			<ol class="breadcrumb">
				<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
				<li class="active">Sale</li>
			</ol>
		</div>
	</div>
</section>
<!--  end page banner -->
<!-- gallery -->        
 <section id="gallery-section" class="gallery-main-block sale-block">
	<div class="container">  
		<div class="section text-center">
			<h3 class="section-heading">Sale</h3>
			<p>Donec pede justo fringilla vel aliquet nec vulputate eget arcu enim rhoncus</p>
		</div>      				
		<div class="row grid">			
			<?php if(isset($sale) && count($sale)>0): ?>
				<?php $__currentLoopData = $sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($item->workphotos->first()): ?>
						<div class="col-lg-4 work-img-block">            
							<div class="gallery-img">
								<img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->categories->title); ?>">
								<div class="overlay-bg">
									<div class="sale-dtl">
										<h5 class="sale-heading"><?php echo e($item->title); ?></h5>
										<div class="product-price">$ <?php echo e($item->price); ?></div>
										<button type="button" class="btn btn-white" data-toggle="modal" data-target="#modalForm">Buy Now</button>
									</div>
								</div>           
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($sale->links()); ?> 
			<?php endif; ?>       
		</div>
	</div>
	<!-- Modal -->
	<div id="modalForm" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-form">     
					<button type="button" class="btn-close close" data-dismiss="modal">&times;</button>
					<h5 class="contact-block-heading">Send Your Enquiry</h5>  
					<form id="contact-form" action="<?php echo e(action('PageController@contact_post')); ?>" method="POST">
						<?php echo e(csrf_field()); ?>

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
<!--end gallery -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
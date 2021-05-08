<?php $__env->startSection('main-content'); ?>
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">    <div class="overlay-bg"></div>
  	<div class="container">
    	<div class="banner-block">
      		<h2 class="banner-heading">Work Detail</h2>
      		<ol class="breadcrumb">
        		<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
        		<li class="active">Work</li>
      		</ol>
    	</div>
  	</div>
</section>
<!--  end page banner -->
<!-- product -->
<section id="product-section" class="product-main-block">
	<div class="container">
		<?php if(isset($work)): ?>
			<div class="row">
				<div class="col-lg-9">
					<div class="product-block">
						<div class="like-btn product-like-btn"><a href="#" class="btn btn-white" data-id="<?php echo e($work->id); ?>"><i class="fas fa-heart"></i> <span><?php echo e($work->like_count); ?></span></a></div>
	          <?php if(isset($work->workphotos) && count($work->workphotos)>0): ?>
	          	<div id="product-gallery" class="owl-carousel product-slider"> 
	          		<?php $__currentLoopData = $work->workphotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		        			<div class="item" dath-thumb="<?php echo e($key == 0 ? '1' : $key); ?>">
		                <div class="product-img">
		                	<img src="<?php echo e(asset('images/work/'.$item->images)); ?>" class="img-fluid" alt="product-thumb">
		                </div>     
		            	</div>
		            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </div>
			      <?php endif; ?>
		        <div class="product-dtl">
	            <div class="product-heading">
	            	<h4 class="product-title"><?php echo e($work->title); ?></h4>
	            	<div class="product-sub-heading"><?php echo e($work->categories->title); ?></div>
	            </div>
	            
	            <p><?php echo e($work->desc); ?></p> 
	            <!-- <div class="product-btn">
	              	<a href="#" class="btn btn-primary"><i class="fas fa-cart"></i>Know More</a>
	            </div> -->
          	</div> 
	        </div> 
		    </div>
        <div class="col-lg-3"> 
        	<div class="widget-block search-widget">
        		<form class="search-form">
							<input type="search" value="" placeholder="Search" class="search-input">
							<button type="submit" class="search-button"><i class="fas fa-search"></i></button>
						</form>
	        </div>  
        	<div class="widget-block category-widget">
        		<?php if(isset($category) && count($category)>0): ?>
            	<h6 class="widget-heading">Categories</h6>
            	<div class="category-content">
            		<ul>            	
									<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <li><a href="<?php echo e(url('category/'.$cat->id)); ?>"><i class="fas fa-caret-right"></i><?php echo e($cat->title); ?></a></li>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              	</ul>
            	</div>
            <?php endif; ?>
        	</div>    
		      <div class="widget-block tag-widget">		        
						<?php if(isset($tags) && count($tags)>0): ?>
							<div class="tagcloud">
		            <h6 class="widget-heading">Tag Widget</h6>
		            <div class="tags">		            	
									<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              	<a href="<?php echo e(url('tag/'.$tag->id)); ?>"><span class="badge"><?php echo e($tag->title); ?></span></a>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </div>       
		        	</div>
		        <?php endif; ?>
		      </div>
		      <div class="widget-block">
            <div class="widget-form"> 
	            <h6 class="widget-heading">Send Your Enquiry</h6>
	            <p>Liked any of our art?? Have any enquiry or want to buy something, contact us :</p>
          		<form id="contact-form" action="<?php echo e(action('PageController@contact_post')); ?>" method="POST">
          			<?php echo e(csrf_field()); ?>


            		<input type="hidden" name="w_email" value="info@arterea.com">
              	<div class="form-group">
                	<input type="text" class="form-control" id="name" name="name" placeholder="Your Name*" required>
              	</div> 
              	<div class="form-group">
                	<input type="text" class="form-control" id="email-contact" name="email" placeholder="Your Email*" required>
              	</div> 
              	<div class="form-group">
                	<input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile*" required>
              	</div> 
              	<div class="form-group">           
                	<textarea id="comment" class="form-control" name="message" placeholder="Your Message*" required></textarea>
              	</div>
            		<div><button class="btn btn-primary" type="submit">Send Message</button></div>
          		</form>
        		</div>
		      </div>
		    </div>
		  </div>
		<?php endif; ?>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
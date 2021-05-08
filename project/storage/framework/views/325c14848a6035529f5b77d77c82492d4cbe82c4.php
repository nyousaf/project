<?php $__env->startSection('main-content'); ?>
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">    <div class="overlay-bg"></div>
  	<div class="container">
    	<div class="banner-block">
      		<h2 class="banner-heading">Gallery</h2>
      		<ol class="breadcrumb">
        		<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
        		<li class="active">Gallery</li>
      		</ol>
    	</div>
  	</div>
</section>
<!--  end page banner -->
<!-- gallery -->        
  <section id="gallery-section" class="gallery-main-block">
    <div class="container">  
      <div class="section text-center">
        <h3 class="section-heading">Gallery</h3>
        <p>Donec pede justo fringilla vel aliquet nec vulputate eget arcu enim rhoncus djsd dgsk</p>
      </div>   
      <div class="gallery">
        <?php if(isset($gallery) && count($gallery)>0): ?>
     	    <div class="row">
            <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-3 gallery-block">            
                <div class="gallery-img">
                  <img src="<?php echo e(asset('images/gallery/'.$item->image)); ?>" class="img-responsive" alt="<?php echo e($item->title); ?>">
                  <div class="overlay-bg"><a href="<?php echo e(asset('images/gallery/'.$item->image)); ?>" title="Your Image Title"><i class="fas fa-plus"></i></a></div>
                </div>           
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php echo e($gallery->links()); ?> 
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<!--end gallery -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
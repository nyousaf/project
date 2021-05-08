<?php $__env->startSection('main-content'); ?>
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">    <div class="overlay-bg"></div>
  	<div class="container">
    	<div class="banner-block">
      		<h2 class="banner-heading">Video</h2>
      		<ol class="breadcrumb">
        		<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
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
      <?php if(isset($video) && count($video)>0): ?>
     	  <div class="row">
          <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 gallery-block">            
              <div class="gallery-img">
                <img src="<?php echo e(asset('images/video/'.$item->image)); ?>" class="img-responsive" alt="<?php echo e($item->title); ?>">
                <div class="overlay-bg"><a class="popup-youtube" href="<?php echo e($item->link); ?>"><i class="fas fa-play"></i></a></div> 
              </div>           
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php echo e($video->links()); ?> 
        </div>
      <?php endif; ?>
    </div>
</section>
<!--end gallery -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
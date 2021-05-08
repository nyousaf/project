<?php $__env->startSection('main-content'); ?>



<section id="work-section " class="work-main-block ">
	<div class="container-fluid ">
		<div class="work-sec-dtl">
				<div class="row grid" style="margin-left: 80px">
					<?php if(isset($blogs) && count($blogs)>0): ?>
					<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<a href="<?php echo e(url('blog/'.$item->id.'/'.$item->title)); ?>" >
						
  <div class="col-lg-5 work-img-block ">
  	<div class="card" style="width: 28rem;">
  	<img src="<?php echo e(asset('images/blog/'.$item->image)); ?>" style="width: 420px;height: 280px;" class="img-fluid card-img-top" alt="<?php echo e($item->title); ?>">	
  <div class="card-body">
    <h5 class="card-title"><?php echo e($item->title); ?></h5>
    <p  class="card-text" data-parent="#accordion"><?php echo $item->details; ?></p>
    <a href="<?php echo e(url('blog/'.$item->id.'/'.$item->title)); ?>" class="btn btn-success">Read More...</a>
</a>
  </div>
</div>
		<!-- <div class="work-block">
		<img src="<?php echo e(asset('images/blog/'.$item->image)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">	
		<div class="overlay-bg"></div>
		<div class="item-dtl">
		<h5 class="item-name"><?php echo e($item->title); ?></h5>
			<a href="#" class="item-by">{!! $item->details !! }</a>
			</div>
				</div> -->
				</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
				
  			<div class="ajax-loading text-center"><i class="fa fa-spinner fa-spin" style="font-size:40px"></i></div>
  			<?php else: ?>
  			<div class="col-12 text-center"><h4>No Post Available</h4></div>
  			<?php endif; ?>	
  			  </div>
</div>

</section>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
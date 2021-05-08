<?php $__env->startSection('main-content'); ?>


<section id="work-section" class="work-main-block">
	<div class="container">
		<?php if($blogs): ?>
	
<div class="card ">
  <div class="card-header">
   	<img src="<?php echo e(asset('images/blog/'.$blogs->image)); ?>" style="height: 300px" class="img-fluid card-img-top" alt="<?php echo e($blogs->title); ?>">	
  </div>
  <div class="card-body">
    <h5 class="card-title text-center"><?php echo e($blogs->title); ?></h5>
    <p class="card-text"data-parent="#accordion"><?php echo $blogs->details; ?></p>
    <a href="<?php echo e(url('/blog')); ?>"  role="button" class="btn btn-success">Back</a>
  </div>
  
</div>
<?php endif; ?>
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('main-content'); ?>
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">    
	<div class="overlay-bg"></div>
  	<div class="container">
    	<div class="banner-block">
      		<h2 class="banner-heading">Tag</h2>
      		<ol class="breadcrumb">
        		<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
        		<li class="active">Tag</li>
      		</ol>
    	</div>
  	</div>
</section>
<!--  end page banner -->
<!-- work -->
<section id="work-section" class="work-main-block">
	<div class="container">
		<div class="section text-center">
			<h2 class="section-heading"><?php echo e($tag->title); ?></h2>
		</div>
		<?php if(isset($tag)): ?>
			<div class="work-sec-dtl">
				<div class="row grid">
					<?php $__currentLoopData = $tag->works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($item->status == '1'): ?>
							<?php if($item->workphotos->first()): ?>
								<div class="col-lg-4 work-img-block">
									<div class="work-block">
										<a href="<?php echo e(url('work-dtl/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
											<img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">		
											<div class="overlay-bg"></div>
											<div class="item-dtl">
												<h5 class="item-name"><?php echo e($item->categories->title); ?></h5>
												<div class="like-btn"><a href="#" class="btn btn-white"><i class="fas fa-heart"></i> 23</a></div>
											</div>
										</a>
									</div>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<?php endif; ?>		
		</div>			
	</div><!-- <a href="#" id="loadMore" class="btn btn-primary">Load More</a>
				<p class="totop"> 
    <a href="#top">Back to top</a> 
</p> -->
</section>
<!-- end work -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
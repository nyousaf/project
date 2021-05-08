<?php $__env->startSection('main-content'); ?>
<!--  page banner -->

<!--  end page banner -->
<!-- work -->
<section id="work-section" class="work-main-block">
	<div class="container">
		<div class="section text-center">
			<h2 class="section-heading"><?php echo e($category->title); ?></h2>
		</div>
		<?php if(isset($category)): ?>
			<div class="work-sec-dtl">
				<div class="row grid">
					<?php $__currentLoopData = $category->works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($item->status == '1'): ?>
							<?php if($item->workphotos->first()): ?>
								<div class="col-lg-4 work-img-block">
									<div class="work-block">
										<a href="<?php echo e(url('photos/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
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
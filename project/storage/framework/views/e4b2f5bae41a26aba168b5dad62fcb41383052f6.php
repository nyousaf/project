<?php $__env->startSection('main-content'); ?>
<!-- Map -->
<section id="page-section" class="page-main-block">
  <div class="container"> 
		<h4 class="search-heading"><?php echo e($search_title); ?> Photos</h4>
		<?php if(isset($results) && count($results)>0): ?>
			<div class="work-main-block">
				<div class="row grid">
					<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($item->workphotos): ?>
							<div class="col-lg-4 work-img-block">
								<div class="work-block">
									<a href="<?php echo e(url('photos/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
										<img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">	
										<div class="overlay-bg"></div>
										<div class="item-dtl">
											<h5 class="item-name"><?php echo e($item->categories->title); ?></h5>
											<a href="#" class="item-by"><?php echo e($item->users->name); ?></a>
										</div>
										<div class="item-btn">
											<?php if(auth()->guard()->check()): ?>
                      	<a href="#" class="btn btn-white img-like <?php echo e($item->isLiked == 1 ? 'active' : null); ?>" data-like="<?php echo e($item->id); ?>" title="Like"><i class="fas fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
                      	<a href="#" class="btn btn-white img-fav <?php echo e($item->isFavorite == 1 ? 'active' : null); ?>" data-fav="<?php echo e($item->id); ?>" title="Collection"><i class="fas fa-plus"></i> <span><?php echo e($item->favorites()->count()); ?></span></a>
                      <?php else: ?>
                      	<a href="<?php echo e(route('login')); ?>" class="btn btn-white img-like" title="like"><i class="fas fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
                      	<a href="<?php echo e(route('login')); ?>" class="btn btn-white img-fav" title="Collection"><i class="fas fa-plus"></i> <span><?php echo e($item->favorites()->count()); ?></span></a>
                      <?php endif; ?>
											<a href="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-white img-download" title="Download" download><i class="fas fa-download"></i><span><?php echo e($item->download); ?></span></a>
										</div>
									</a>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
        
    <?php else: ?>
    	<h5>No Results Found</h5>
		<?php endif; ?>		
	</div><!-- <a href="#" id="loadMore" class="btn btn-primary">Load More</a>
				<p class="totop"> 
    <a href="#top">Back to top</a> 
</p> -->
</section>
<!-- end work -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
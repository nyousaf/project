<?php if(isset($work) && count($work)>0): ?>
	<div class="row grid">
		<?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($item->workphotos->first()): ?>
				<div class="col-lg-4 work-img-block">
					<div class="work-block">
						<a href="<?php echo e(url('work-dtl/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
							<img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">	
							<div class="overlay-bg"></div>
							<div class="item-dtl">
								<h5 class="item-name"><?php echo e($item->categories->title); ?></h5>
								<div class="like-btn"><a href="#" class="btn btn-white" data-id="<?php echo e($item->id); ?>"><i class="fas fa-heart"></i> <span><?php echo e($item->like_count); ?></span></a></div>
							</div>
						</a>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
<?php endif; ?>
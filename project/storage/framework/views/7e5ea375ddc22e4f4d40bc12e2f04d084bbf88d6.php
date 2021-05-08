<?php $__env->startSection('main-content'); ?>
<!-- section -->
<section id="page-section" class="page-main-block my-photo-page">
  <div class="container">               
    <div class="row">
    	<div class="col-md-3">
    		<div class="main-block-sidenav">
           <?php echo $__env->make('includes.user-tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    	</div>
			<div class="col-md-9">
        <div class="my-photo-content">
          <h3 class="page-heading">My Photos</h3>
          <div class="row grid">            
            <?php if(isset($photo) && count($photo)>0): ?>
  						<?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->workphotos->first()): ?>
                  <div class="col-lg-4 work-img-block">
                    <div class="work-block">
                      <a href="<?php echo e(url('photos/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"> 
                        <?php if($item->workphotos->first()): ?>
                          <img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">
                        <?php else: ?>
                          <img src="<?php echo e(asset('images/work/default.jpg')); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">
                        <?php endif; ?>
                        <div class="overlay-bg"></div>
                        <?php if($item->status == '1'): ?>
                          <div class="work-action-block">
                            <a href="<?php echo e(route('upload.edit', $item->id)); ?>" class="btn btn-white"><i class="fa fa-edit"></i></a> 
                            <!-- Delete Modal -->
                            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#<?php echo e($item->id); ?>deleteModal"><i class="fa fa-trash"></i> </button>
                            <!-- Modal -->
                            <div id="<?php echo e($item->id); ?>deleteModal" class="delete-modal modal fade" role="dialog">
                              <div class="modal-dialog modal-sm">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="delete-icon"></div>
                                  </div>
                                  <div class="modal-body text-center">
                                    <h4 class="modal-heading">Are You Sure ?</h4>
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                  </div>
                                  <div class="modal-footer">
                                    <?php echo Form::open(['method' => 'DELETE', 'action' => ['UploadController@destroy', $item->id]]); ?>

                                        <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                    <?php echo Form::close(); ?>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?> 
                        <div class="item-dtl">
                          <h5 class="item-name"><?php echo e($item->categories->title); ?></h5>
                          <a href="#" class="item-by"><?php echo e($item->users->name); ?></a>
                        </div>
                        <div class="item-btn">
                          <?php if(auth()->guard()->check()): ?>
                            <a href="#" class="btn btn-white img-like <?php echo e($item->isLiked == 1 ? 'active' : null); ?>" data-like="<?php echo e($item->id); ?>" title="like"><i class="fa fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
                          <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-white img-like" title="like"><i class="fa fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
                          <?php endif; ?>
                          <?php if($item->workphotos->first()): ?>
                            <a href="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-white img-download" download><i class="fa fa-download"></i><span><?php echo e($item->download); ?></span></a>
                          <?php endif; ?>
                        </div>
                      </a>
                      <?php if($item->status == 0): ?> 
                        <div class="label label-warning">Rejected</div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
            <?php else: ?>
              <div class="no-block">No Photos Yet</div>
            <?php endif; ?>
  				</div>
        </div>
			</div>
		</div> 
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
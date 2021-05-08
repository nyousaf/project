<?php $__env->startSection('main-content'); ?>
<!-- section -->
<section id="page-section" class="page-main-block followers-page">
  <div class="container">               
    <div class="row">
      <div class="col-sm-3">
       <div class="main-block-sidenav">
           <?php echo $__env->make('includes.user-tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="page-content">
          <h3 class="page-heading">My Followers</h3>
          <div class="row">
            <?php if(isset($auth->followers)): ?>
              <?php $__currentLoopData = $auth->followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-1">
                  <div class="profile-img">
                    <a href="<?php echo e(url('profile/'.$item->uni_id.'/'.str_slug($item->name,'-'))); ?>" title="<?php echo e($item->name); ?>"><img src="<?php echo e(asset('images/user/'.$item->image)); ?>" class="img-fluid" alt="User">
                      <div class="dash-username"><?php echo e($item->name); ?></div>
                    </a>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
            <?php else: ?>
              <div class="no-block">No Followers Yet</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div> 
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
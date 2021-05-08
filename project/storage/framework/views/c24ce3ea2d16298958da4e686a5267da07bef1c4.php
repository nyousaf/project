<?php $__env->startSection('main-content'); ?>
<!--  page banner -->

<!--  end page banner -->
<!-- section -->
<section id="page-section" class="page-main-block">
  <div class="container-flude">               
    <div class="row">
      <div class="col-md-3">
     <div class="main-block-sidenav">
           <?php echo $__env->make('includes.user-tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
      <div class="col-md-9">
         <h3 class="title">My Followers</h3>
        <div class="row">
          <?php if(isset($auth->followings)): ?>
            <?php $__currentLoopData = $auth->followings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xs-1">
                <div class="profile-img">
                  <a href="<?php echo e(url('profile/'.$item->id)); ?>" title="<?php echo e($item->name); ?>"><img src="<?php echo e(asset('images/user/'.$item->image)); ?>" class="img-fluid" alt="User"></a>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
          <?php else: ?> 
            <div class="no-block">No Followings Yet</div>
          <?php endif; ?>
      </div>
    </div> 
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
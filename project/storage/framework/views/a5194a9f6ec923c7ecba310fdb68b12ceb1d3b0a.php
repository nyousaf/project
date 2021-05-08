<?php $__env->startSection('main-content'); ?>
<!-- Section -->
<section id="page-section" class="page-main-block account-page">
  <div class="container">               
    <div class="row">
    	<div class="col-md-3">
        <div class="main-block-sidenav">
           <?php echo $__env->make('includes.user-tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    	</div>
			<div class="col-md-9">
				
				<div class="dashboard-main-block">
          <div class="profile-block text-center">
            <h2 class="profile-username"><?php echo e($auth->name); ?></h2>
            <div class="post"><?php echo e($auth->is_admin == '1' ? 'Administrator' : 'User'); ?></div>
            <div class="join-date">Joined on <?php echo e($auth->created_at->format('jS F, Y')); ?></div>
            <div class="holder-info">
              <p><?php echo e($auth->brief); ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4"> 
              <div class="dash-item">
                <div class="dash-item-icon"><i class="fa fa-image"></i></div>
                <div class="dash-item-name">Photos</div>
                <div class="dash-item-title"><?php echo e($auth->works->count()); ?></div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="dash-item">
                <div class="dash-item-icon"><i class="fa fa-folder"></i></div>
                <div class="dash-item-name">Collection</div>
                <div class="dash-item-title"><?php echo e($auth->user_favorites->count()); ?></div>
              </div>
            </div>
            <div class="col-lg-4"> 
              <div class="dash-item">
                <div class="dash-item-icon"><i class="fa fa-users"></i></div>
                <div class="dash-item-name">Followers</div>
                <div class="dash-item-title"><?php echo e($auth->followers->count()); ?></div>
              </div>
            </div>
            <div class="col-lg-4"> 
              <div class="dash-item">
                <div class="dash-item-icon"><i class="fa fa-users"></i></div>
                <div class="dash-item-name">Followings</div>
                <div class="dash-item-title"><?php echo e($auth->followings->count()); ?></div>
              </div>
            </div>
          </div>
        </div>
			</div>
		</div> 
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
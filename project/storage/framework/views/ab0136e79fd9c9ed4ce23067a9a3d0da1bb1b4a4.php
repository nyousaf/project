<?php $__env->startSection('content'); ?>
  <div class="content-main-block mrg-t-40">
  	<h4 class="admin-form-text">Dashboard</h4>
    <div class="row">
    	<div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/category')); ?>" class="small-box z-depth-1 hoverable bg-aqua default-color">
          <div class="inner">
            <h3><?php echo e($cat_count); ?></h3>
            <p>Total Category</p>
          </div>
          <div class="icon">
            <i class="material-icons">device_hub</i>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(route('photos.index')); ?>" class="small-box z-depth-1 hoverable bg-red danger-color">
          <div class="inner">
            <h3><?php echo e($prod_count); ?></h3>
            <p>Total Photos</p>
          </div>
          <div class="icon">
            <i class="material-icons">color_lens</i>
          </div>
        </a>
      </div>      
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(route('pend.pho')); ?>" class="small-box z-depth-1 hoverable bg-purple">
          <div class="inner">
            <?php
              $approves = App\Work::where('status', '=', 2)->get();
            ?>
            <h3><?php echo e($approves->count()); ?></h3>
            <p>Total Approval</p>
          </div>
          <div class="icon">
            <i class="material-icons">turned_in</i>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/user_form')); ?>" class="small-box z-depth-1 hoverable bg-red warning-color">
          <div class="inner">
            <?php
              $users = App\users::all();
            ?>
            <h3><?php echo e($users->count()); ?></h3>
            <p>Total User</p>
          </div>
          <div class="icon">
            <i class="material-icons">grade</i>
          </div>
        </a>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', [
  'page_header' => 'Admin'
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
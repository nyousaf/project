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
        <a href="<?php echo e(url('admin/work')); ?>" class="small-box z-depth-1 hoverable bg-red danger-color">
          <div class="inner">
            <h3><?php echo e($prod_count); ?></h3>
            <p>Total Products</p>
          </div>
          <div class="icon">
            <i class="material-icons">color_lens</i>
          </div>
        </a>
      </div>      
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/work')); ?>" class="small-box z-depth-1 hoverable bg-purple">
          <div class="inner">
            <h3><?php echo e($pub_count); ?></h3>
            <p>Total Published</p>
          </div>
          <div class="icon">
            <i class="material-icons">turned_in</i>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/work')); ?>" class="small-box z-depth-1 hoverable bg-red warning-color">
          <div class="inner">
            <h3><?php echo e($featured_count); ?></h3>
            <p>Total Featured</p>
          </div>
          <div class="icon">
            <i class="material-icons">grade</i>
          </div>
        </a>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/work')); ?>" class="small-box z-depth-1 hoverable bg-green">
          <div class="inner">
            <h3><?php echo e($sale_count); ?></h3>
            <p>On Sale</p>
          </div>
          <div class="icon">
            <i class="material-icons">attach_money</i>
          </div>
        </a>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', [
  'page_header' => 'Admin'
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
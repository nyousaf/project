<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(route('social.index')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit Social Icons</h4> 
    <?php echo Form::model($social1, ['method' => 'PATCH', 'action' => ['SocialController@update', $social1->id]]); ?>

      <div class="row admin-form-block z-depth-1">
        <div class="col-md-6">
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
            <?php echo Form::label('title', 'Social Title'); ?>

            <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

            <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('icon') ? ' has-error' : ''); ?> currency-symbol-block">
            <?php echo Form::label('icon', 'Social Symbol'); ?>

            <p class="inline info"> - Please select social symbol</p>
              <div class="input-group">
                <?php echo Form::text('icon', null, ['class' => 'form-control social-icon-picker']); ?>

                <span class="input-group-addon simple-input"><i class="glyphicon glyphicon-user"></i></span>
              </div>
            <small class="text-danger"><?php echo e($errors->first('icon')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('url') ? ' has-error' : ''); ?>">
            <?php echo Form::label('url', 'Social Url'); ?>

            <?php echo Form::text('url', null, ['class' => 'form-control']); ?>

            <small class="text-danger"><?php echo e($errors->first('url')); ?></small>
          </div>
          <div class="btn-group pull-right">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
          <div class="clear-both"></div>
        </div>  
      </div>
    <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  $(function () {
    $('.social-icon-picker').iconpicker({
      title: 'Social Symbols',
      icons: ['fa fa-facebook', 'fa fa-twitter', 'fa fa-pinterest', 'fa fa-github', 'fa fa-google', 'fa fa-instagram', 'fa fa-flickr', 'fa fa-dribbble', 'fa fa-youtube'],
      selectedCustomClass: 'label label-primary',
      mustAccept: false,
      placement: 'rightBottom',
      showFooter: false,
      hideOnSelect: true,
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
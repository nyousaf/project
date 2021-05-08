<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/pages')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Add Pages</h4> 
    <?php echo Form::open(['method' => 'POST', 'action' => 'PagesController@store']); ?>

      <div class="row admin-form-block z-depth-1">
        <div class="col-md-12">
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
              <?php echo Form::label('title', 'Page Title'); ?>

              <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
          </div>
          <div class="summernote-main form-group<?php echo e($errors->has('body') ? ' has-error' : ''); ?>">
            <?php echo Form::label('body', 'Page Body'); ?>

            <?php echo Form::textarea('body', null, ['id' => 'summernote-main', 'class' => 'form-control']); ?>

            <small class="text-danger"><?php echo e($errors->first('body')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('widget') ? ' has-error' : ''); ?>">
              <?php echo Form::label('widget', 'Select Footer Widget'); ?>

              <?php echo Form::select('widget', ['1' => 'None', '2' => 'Widget 2', '3' => 'Widget 3'], null, ['class' => 'form-control select2']); ?>

              <small class="text-danger"><?php echo e($errors->first('widget')); ?></small>
          </div>
          <div class="btn-group pull-right">
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Create</button>
          </div>
          <div class="clear-both"></div>
        </div>  
      </div>
    <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
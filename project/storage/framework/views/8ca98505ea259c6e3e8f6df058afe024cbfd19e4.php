<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/faq')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit <?php echo e($faq->title); ?></h4> 
    <?php echo Form::model($faq, ['method' => 'PATCH', 'action' => ['FAQController@update', $faq->id]]); ?>

      <div class="row admin-form-block z-depth-1">
        <div class="col-md-12">
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
              <?php echo Form::label('title', 'FAQ Title'); ?>

              <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
          </div>
          <div class="summernote-main form-group<?php echo e($errors->has('body') ? ' has-error' : ''); ?>">
            <?php echo Form::label('desc', 'FAQ Description'); ?>

            <?php echo Form::textarea('desc', null, ['id' => 'summernote-main', 'class' => 'form-control']); ?>

            <small class="text-danger"><?php echo e($errors->first('body')); ?></small>
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
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
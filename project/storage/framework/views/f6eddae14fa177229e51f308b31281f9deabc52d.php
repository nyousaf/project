<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/video')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Add Video</h4> 
    <?php echo Form::open(['method' => 'POST', 'action' => 'VideoController@store', 'files' => true]); ?>

      <div class="row admin-form-block z-depth-1">
        <div class="col-md-6">
          <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
              <?php echo Form::label('category_id', 'Select Catgeory'); ?>

              <?php echo Form::select('category_id', $all_category, null, ['class' => 'form-control select2']); ?>

              <small class="text-danger"><?php echo e($errors->first('category_id')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
              <?php echo Form::label('title', 'Title'); ?>

              <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
          </div>
          <div id="link-block" class="form-group<?php echo e($errors->has('link') ? ' has-error' : ''); ?>">
              <?php echo Form::label('link', 'Video URL'); ?>

              <?php echo Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'https://www.google.com']); ?>

              <small class="text-danger"><?php echo e($errors->first('link')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
            <?php echo Form::label('image', 'Video Image'); ?> - <p class="inline info">Help block text</p>
            <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

            <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Category Image">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose a File</span>
            </label>
            <p class="info">Choose custom image</p>
            <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
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
<?php $__env->startSection('custom-script'); ?>
  <script>
    $('#category').on('change', function() {
      if ( this.value == 'v')
        $("#link-block").show();     
      else
        $("#link-block").hide();
    }).trigger("change");
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
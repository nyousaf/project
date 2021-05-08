<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block mrgn-t-40">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/photos')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Add Photos</h4> 
    <?php echo Form::open(['method' => 'POST', 'action' => 'WorkController@store', 'files' => true]); ?>

      <div class="row admin-form-block z-depth-1">
        <div class="col-md-6">
          <div class="form-group<?php echo e($errors->has('user_id') ? ' has-error' : ''); ?>">
              <?php echo Form::label('user_id', 'Select User'); ?>

              <?php echo Form::select('user_id', $all_user, null, ['class' => 'form-control select2','required']); ?>

              <small class="text-danger"><?php echo e($errors->first('user_id')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
              <?php echo Form::label('category_id', 'Select Catgeory'); ?>

              <?php echo Form::select('category_id', $all_category, null, ['class' => 'form-control select2','required']); ?>

              <small class="text-danger"><?php echo e($errors->first('category_id')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
              <?php echo Form::label('title', 'Title'); ?>

              <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
          </div>          
          <div class="form-group<?php echo e($errors->has('desc') ? ' has-error' : ''); ?>">
              <?php echo Form::label('desc', 'Description'); ?>

              <?php echo Form::textarea('desc', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('desc')); ?></small>
          </div>   
          <div class="form-group<?php echo e($errors->has('tag') ? ' has-error' : ''); ?>">
              <?php echo Form::label('tag', 'Tag'); ?>

              <?php echo Form::select('tag[]', $tags, null, ['class' => 'form-control tag-select', 'multiple' => 'multiple','required']); ?>

              <small class="text-danger"><?php echo e($errors->first('tag')); ?></small>
          </div>   
          <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
            <?php echo Form::label('status', 'Select Status'); ?>

            <?php echo Form::select('status', ['1' => 'Approved', '2' => 'Pending', '0' => 'Rejected'], null, ['class' => 'form-control select2']); ?>

            <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
          </div>
          
          <div class="form-group<?php echo e($errors->has('lic_id') ? ' has-error' : ''); ?>">
            <?php echo Form::label('lic_id', 'Select License Type'); ?>

            <select name="lic_id" class="form-control select2">
              <option value="0">Please Choose</option>
              <?php $__currentLoopData = $license; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($lic->id); ?>"><?php echo e($lic->title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <small class="text-danger"><?php echo e($errors->first('status')); ?></small>
          </div>  
          
          <div class="form-group<?php echo e($errors->has('is_featured') ? ' has-error' : ''); ?> switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                <?php echo Form::label('is_featured', 'Featured'); ?>

              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  <?php echo Form::checkbox('is_featured', 1, 1, ['class' => 'checkbox-switch']); ?>

                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger"><?php echo e($errors->first('is_featured')); ?></small>
            </div>
          </div>                                             
          <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                <?php echo Form::label('is_active', 'Active Status'); ?>

              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  <?php echo Form::checkbox('is_active', 1, 1, ['class' => 'checkbox-switch']); ?>

                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger"><?php echo e($errors->first('is_active')); ?></small>
            </div>
          </div>

          <div class="form-group">
            <label>Meta Tag:</label>
            <input type="text" name="meta_tag" class="form-control" placeholder="Enter keyword by comma">
          </div>

          <div class="form-group">
            <label>Meta Description: </label>
            <textarea name="meta_desc" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>

          <div class="form-group<?php echo e($errors->has('images') ? ' has-error' : ''); ?> input-file-block">
            <?php echo Form::label('images', 'Image'); ?> - <p class="inline info">Help block text</p>
            <?php echo Form::file('images', ['class' => 'input-file', 'id'=>'images']); ?>

            <label for="images" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Work Image">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose File</span>
            </label>
            <p class="info">Choose custom image</p>
            <small class="text-danger"><?php echo e($errors->first('images')); ?></small>
          </div>  

          <div class="form-group<?php echo e($errors->has('is_psd') ? ' has-error' : ''); ?> switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                <?php echo Form::label('is_psd', 'PSD or AI Files'); ?>

              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  <input type="checkbox" onclick="showzip()" class="checkbox-switch" name="is_psd" id="is_psd"/>
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger"><?php echo e($errors->first('is_psd')); ?></small>
            </div>
          </div>


 <div style="display:none;" class="input-file-block" id="file_zip">
            <?php echo Form::label('zip', 'zip'); ?> - <p class="inline info">Help block text</p>
            <?php echo Form::file('zip', ['class' => 'input-file', 'id'=>'zip']); ?>

            <label for="zip" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="Zip File">
              <i class="icon fa fa-check"></i>
              <span class="js-fileName">Choose File</span>
            </label>
            <p class="info">Choose custom File</p>
            <small class="text-danger"><?php echo e($errors->first('zip')); ?></small>
          </div>  


          <div class="btn-group pull-right">
            <button type="reset" class="btn btn-info">Reset</button>
            <button type="submit" class="btn btn-success">Create</button>
          </div>
          <div class="clear-both"></div>
        </div>  

        <div class="col-md-6">
          <h5>Image Info</h5>
          <hr>

          <div class="form-group">
            <label>Model:</label>
            <input type="text" class="form-control" value="" name="model" placeholder="Enter Model No">
          </div>

          <div class="form-group">
              <label>Dimension:</label>
              <input name="dimension" type="text" value="" class="form-control" placeholder="ex. 2000x2000">
          </div>
          
          <div class="form-group">
            <label>Aperture:</label>
            <input name="aperture" type="text" value="" class="form-control" placeholder="ex. f2.0">
          </div>
          
          <div class="form-group">
            <label>Focal Length:</label>
            <input type="text" name="focal_len" value="" class="form-control" placeholder="ex. 28mm">
          </div>

          <div class="form-group">
            <label>ISO:</label>
            <input type="text" name="iso" value="" class="form-control" placeholder="ex. ISO800">
          </div>

          <div class="form-group">
            <label>Shutter Speed:</label>
            <input type="text" name="shutter_speed" value="" class="form-control" placeholder="ex. 1/4000th">
          </div>
         
        </div>
      </div>
    <?php echo Form::close(); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script type="text/javascript">

function showzip(){

  if ($('#is_psd').is(':checked')) {
    $('#file_zip').show('slow');
  }else{
     $('#file_zip').hide('slow');
  }


}

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
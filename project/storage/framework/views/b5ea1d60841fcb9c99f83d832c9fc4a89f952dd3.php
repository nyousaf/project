<?php $__env->startSection('main-content'); ?>
<!--  page banner -->

<!--  end page banner -->
<!-- Map -->
<section id="page-section" class="page-main-block">
  <div class="container-flude">               
    <div class="row">
    	<div class="col-sm-3">
    	<div class="main-block-sidenav">
           <?php echo $__env->make('includes.user-tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    	</div>
			<div class="col-sm-8 form-area">
  			<?php echo Form::open(['class' => 'upload-form', 'method' => 'POST', 'action' => 'UploadController@store', 'files' => true]); ?>

					<h3 class="title">Upload Photo Informations</h3>
					<input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">  
					<div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
            <?php echo Form::select('category_id', $category, null, ['class' => 'form-control options', 'placeholder' => '--Select Category--', 'required']); ?>

            <small class="text-danger"><?php echo e($errors->first('category_id')); ?></small>
          </div>
          <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
            <?php echo Form::text('title', null, ['class' => 'form-control text_field', 'placeholder' => 'Picture Name']); ?>

            <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
          </div>          
          <div class="form-group<?php echo e($errors->has('desc') ? ' has-error' : ''); ?>">
            <?php echo Form::textarea('desc', null, ['class' => 'form-control text_field', 'placeholder' => 'Picture Information']); ?>

            <small class="text-danger"><?php echo e($errors->first('desc')); ?></small>
          </div>      
          <div class="form-group<?php echo e($errors->has('tag') ? ' has-error' : ''); ?>">
              <?php echo Form::select('tag[]', $tags, null, ['class' => 'form-control tags-select', 'multiple' => 'multiple','required']); ?>

              <small class="text-danger"><?php echo e($errors->first('tag')); ?></small>
          </div>  
					<div class="text-left form-group<?php echo e($errors->has('images') ? ' has-error' : ''); ?> input-file-block"> 
            <?php echo Form::file('images', ['class' => 'input-file', 'id'=>'images', 'required']); ?>

            <small class="text-danger"><?php echo e($errors->first('images')); ?></small>	
          </div> 
					<div class="term-and-conditions text-left">
						<input type="checkbox" checked=""> I have read and accepted official contest rules.
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
  			<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-scripts'); ?>
<script>
var _URL = window.URL || window.webkitURL;
$("#images").change(function(e) {
    var image, file;
    if ((file = this.files[0])) {
        image = new Image();
        image.onload = function() {
          if( this.width < 1000 || height == 300 ) {
                form.submit();
            }
            else {
                //fail
            }
            alert("The image width is " +this.width + " and image height is " + this.height);
        };
        image.src = _URL.createObjectURL(file);
    }
});​
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
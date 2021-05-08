<?php $__env->startSection('main-content'); ?>
<!-- section -->
<section id="page-section" class="page-main-block upload-page">
  <div class="container">               
    <div class="row">
    	<div class="col-sm-3">
    	<div class="main-block-sidenav">
           <?php echo $__env->make('includes.user-tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    	</div>
			<div class="col-sm-9">
        <div class="page-content">
          <h3 class="page-heading">Upload Photo Informations</h3>
  			  <?php echo Form::open(['class' => 'upload-form', 'method' => 'POST', 'action' => 'UploadController@store', 'files' => true]); ?>

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
              <br>	
              <small style="margin-top:15px;">Min. Image Width :1000px and height 300px is required</small>
            </div> 
  					<div class="term-and-conditions text-left">
  						<input type="checkbox" checked=""> I have read and accepted all T&C.
  					</div>
  					<button type="submit" class="btn btn-primary">Submit</button>
    			<?php echo Form::close(); ?>

  			</div>
      </div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-scripts'); ?>
<script>
var _URL = window.URL || window.webkitURL;

$("#images").change(function(e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
          if(this.width < 1000 || this.height <= 300){
            alert( "Image is too small");
            $('#images').val('');
          }
        };
        img.src = _URL.createObjectURL(file);
    }

});
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
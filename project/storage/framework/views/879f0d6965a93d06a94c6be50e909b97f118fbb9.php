<?php $__env->startSection('main-content'); ?> <!--Sub Banner Wrap End-->
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">    <div class="overlay-bg"></div>
  	<div class="container">
    	<div class="banner-block">
      		<h2 class="banner-heading">Login</h2>
      		<ol class="breadcrumb">
        		<li><a href="<?php echo e(asset('/')); ?>">Home</a></li>
        		<li class="active">Login</li>
      		</ol>
    	</div>
  	</div>
</section>
<section id="login-section" class="login-main-block">
	<div class="container">
		<div class="row">
			<div class="offset-lg-3 col-lg-6">
				<!-- Login Form Start-->
				<div class="login-register-form">								
					<div class="section text-center">
			      <h3 class="section-heading">Login Now</h3>
			      <p>Please Login To Your Account</p>
			    </div> 
					<!-- Form Start--> 
          <form method="POST" action="<?php echo e(route('login')); ?>">
					<?php echo e(csrf_field()); ?>

						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <?php echo Form::label('email', 'Email'); ?>

              <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
          	</div>
          	<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <?php echo Form::label('password', 'Password'); ?>

              <?php echo Form::password('password',  ['class' => 'form-control']); ?>

              <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
          	</div>
						<div class="forgot-block"><a href="<?php echo e(route('password.request')); ?>">Forgot Your Password?</a></div>
            <button type="submit" class="btn btn-primary login-btn">Login Now</button>
    			</form>      
        </div>
					<!-- Form End-->
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
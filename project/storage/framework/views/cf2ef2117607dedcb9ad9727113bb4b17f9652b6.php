<?php $__env->startSection('main-content'); ?> 
<!--  section -->
<section id="login-section" class="login-main-block" style="background-image: url(<?php echo e(asset('images/slider-01.jpg')); ?>)">
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

						<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <?php echo Form::email('email', null, ['class' => 'form-control','placeholder' => 'Email']); ?>

              <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
          	</div>
          	<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <?php echo Form::password('password',  ['class' => 'form-control', 'placeholder' => 'Password']); ?>

              <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
          	</div>
						<div class="forgot-block"><a href="<?php echo e(route('password.request')); ?>">Forgot Your Password?</a></div>
            <button type="submit" class="btn btn-primary login-btn">Login Now</button>
            
            <a href="<?php echo e(url('/auth/facebook')); ?>" class="btn btn-primary fb-btn" title="Register With Facebook"><i class="fa fa-facebook-f"></i>Login With Facebook</a>
            <a href="<?php echo e(url('/auth/google')); ?>" class="btn btn-primary gplus-btn" title="Register With Google"><i class="fa fa-google"></i>Login With Google</a>
    			</form>      
        </div>
					<!-- Form End-->
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
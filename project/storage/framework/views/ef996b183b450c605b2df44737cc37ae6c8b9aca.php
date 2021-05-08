<?php $__env->startSection('main-content'); ?> 
<!--Section-->
<section id="login-section" class="login-main-block" style="background-image: url(<?php echo e(asset('images/slider-01.jpg')); ?>)">
	<div class="container">
		<div class="row">
			<div class="offset-lg-3 col-lg-6">
				<!-- Login Form Start-->
				<div class="login-register-form">								
					<div class="section text-center">
			      <h3 class="section-heading">Register Now</h3>
			      <p>Explore Unlimited Images</p>
			    </div> 
					<!-- Form Start--> 
					<form method="POST" action="<?php echo e(route('register')); ?>">
						<?php echo e(csrf_field()); ?>

						<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
							<input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Name*" required autofocus>
							<?php if($errors->has('name')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('name')); ?></strong>
								</span>
							<?php endif; ?>
						</div>
						<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
							<input id="email" type="email" class="form-control" name="email" placeholder="Email*" value="<?php echo e(old('email')); ?>" required>
							<?php if($errors->has('email')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('email')); ?></strong>
								</span>
							<?php endif; ?>	
						</div>
						<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
							<input id="password" type="password" class="form-control" name="password" placeholder="Password*" required>
							<?php if($errors->has('password')): ?>
								<span class="help-block">
									<strong><?php echo e($errors->first('password')); ?></strong>
								</span>
							<?php endif; ?>	
						</div>
						<div class="form-group">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password*" required>
						</div>
            <button type="submit" class="btn btn-primary login-btn">Register Now</button>
	      		<a href="<?php echo e(url('/auth/facebook')); ?>" class="btn btn-primary fb-btn" title="Register With Facebook"><i class="fab fa-facebook-f"></i>Register With Facebook</a>
	      		<a href="<?php echo e(url('/auth/google')); ?>" class="btn btn-primary gplus-btn" title="Register With Google"><i class="fab fa-google"></i>Register With Google</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
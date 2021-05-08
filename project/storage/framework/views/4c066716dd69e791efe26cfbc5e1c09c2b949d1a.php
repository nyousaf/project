<?php $__env->startSection('main-content'); ?> <!--Sub Banner Wrap End-->
<!--  page banner -->
<section id="page-banner" class="banner-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">    <div class="overlay-bg"></div>
	<div class="container">
		<div class="banner-block">
			<h2 class="banner-heading">Login</h2>
			<ol class="breadcrumb">
				<li><a href="<?php echo e(asset('/')); ?>">Home</a></li>
				<li class="active">Reset Password</li>
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
					  <h3 class="section-heading">Reset Password</h3>
					</div> 
					<?php if(session('status')): ?>
						<div class="alert alert-success">
							<?php echo e(session('status')); ?>

						</div>
					<?php endif; ?>
					<form method="POST" action="<?php echo e(route('password.email')); ?>">
						<?php echo e(csrf_field()); ?>


						<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
							<label for="email" class="control-label">E-Mail Address</label>
							<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
							<?php if($errors->has('email')): ?>
								<span class="help-block">
									<?php echo e($errors->first('email')); ?>

								</span>
							<?php endif; ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								Send Password Reset Link
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
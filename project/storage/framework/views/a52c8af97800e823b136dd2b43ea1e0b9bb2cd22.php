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
						 <?php
            $fb_status = App\Settings::select('fb_login')->where('id','=',1)->first();
            $g_status = App\Settings::select('google_login')->where('id','=',1)->first();
            $gitlab_status = App\Settings::select('gitlab_login')->where('id','=',1)->first();
          ?>
            <button type="submit" class="btn btn-outline-success btn-md btn-block login-btn">Register Now</button><br>
	      		
	      		 <?php if($fb_status->fb_login == 1): ?>
	      		<a  href="<?php echo e(route('sociallogin','facebook')); ?>"  type="button" class="btn btn-info fb-btn btn-md" title="Register With Facebook"><i class="fa fa-facebook"></i>Facebook</a>
	      		  <?php endif; ?>
	      		    <?php if($g_status->google_login == 1): ?>
	      		<a  href="<?php echo e(route('sociallogin','google')); ?>"  type="button" class="btn btn-danger gplus-btn btn-md" title="Register With Google"><i class="fa fa-google"></i>Google</a>
                   <?php endif; ?>
                    <?php if($gitlab_status->gitlab_login == 1): ?>
                  <a  href="<?php echo e(route('sociallogin','gitlab')); ?>" type="button" class="btn btn-md btn-gitlab btn-default">
                   <i class="fa fa-gitlab"></i>Gitlab
                    </a>

           <?php endif; ?>
           
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('main-content'); ?>
<!-- section -->
<section id="page-section" class="page-main-block profile-edit">
  <div class="container">               
    <div class="row">
    	<div class="col-sm-3">
    		<div class="main-block-sidenav">
    		   <?php echo $__env->make('includes.user-tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    		</div>
    	</div>
			<div class="col-sm-9">
				<div class="page-content">
          <h3 class="page-heading">Edit Profile</h3>
					<?php echo Form::model($auth, ['method' => 'PATCH','action' => ['UserDashboardController@profile_update', $auth->id], 'files' => true, 'class' => 'profile-form']); ?>

						<?php echo e(csrf_field()); ?>

      			<div class="row">
      				<div class="col-md-6">
				        <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
			            <?php echo Form::label('image', 'User Image'); ?>

			            <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

			            <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
		            </div> 
								<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
									<?php echo Form::label('name', 'User Name*'); ?>

									<?php echo Form::text('name', null, ['class' => 'form-control', 'required']); ?>

									<small class="text-danger"><?php echo e($errors->first('name')); ?></small>
								</div> 
								<?php if(str_is('*@facebook.com', $auth->email) || str_is('*@google.com', $auth->email)): ?>
    							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
    								<?php echo Form::label('email', 'Email Address*'); ?>

    								<?php echo Form::email('email', null, ['class' => 'form-control', 'required']); ?>

    								<small class="text-danger"><?php echo e($errors->first('email')); ?></small>
    							</div> 
    						<?php else: ?>
        					<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
    								<?php echo Form::label('email', 'Email Address*'); ?>

    								<?php echo Form::email('email', null, ['class' => 'form-control', 'disabled']); ?>

    								<small class="text-danger"><?php echo e($errors->first('email')); ?></small>
    							</div> 
    						<?php endif; ?>	
								<div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
									<?php echo Form::label('gender', 'Choose Your Gender'); ?>

									<?php echo Form::select('gender', ['m' => 'Male', 'f' => 'Female'], null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('gender')); ?></small>
								</div> 
								<div class="form-group<?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">
									<?php echo Form::label('mobile', 'Mobile Number'); ?>

									<?php echo Form::text('mobile', null, ['class' => 'form-control', 'required']); ?>

									<small class="text-danger"><?php echo e($errors->first('mobile')); ?></small>
								</div>
								<div class="form-group<?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
									<?php echo Form::label('dob', 'Date of Birth*'); ?>

									<?php echo Form::date('dob', null, ['class' => 'form-control date-picker', 'required']); ?>

									<small class="text-danger"><?php echo e($errors->first('dob')); ?></small>
								</div> 
								<div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
									<?php echo Form::label('address', 'Your Address'); ?>

									<?php echo Form::textarea('address', null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('address')); ?></small>
								</div> 
								<div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
									<?php echo Form::label('	city', 'City*'); ?>

									<?php echo Form::text('city', null, ['class' => 'form-control', 'required']); ?>

									<small class="text-danger"><?php echo e($errors->first('city')); ?></small>
								</div>
								<div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
									<?php echo Form::label('state', 'State*'); ?>

									<?php echo Form::text('state', null, ['class' => 'form-control', 'required']); ?>

									<small class="text-danger"><?php echo e($errors->first('state')); ?></small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
									<?php echo Form::label('country', 'Country*'); ?>

									<?php echo Form::text('country', null, ['class' => 'form-control', 'required']); ?>

									<small class="text-danger"><?php echo e($errors->first('country')); ?></small>
								</div>
								<div class="form-group<?php echo e($errors->has('fb_url') ? ' has-error' : ''); ?>">
									<?php echo Form::label('fb_url', 'Facebook Link'); ?>

									<?php echo Form::text('fb_url', $auth->socials ? $auth->socials->fb_url : null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('fb_url')); ?></small>
								</div>
								<div class="form-group<?php echo e($errors->has('twi_url') ? ' has-error' : ''); ?>">
									<?php echo Form::label('twi_url', 'Twitter Link'); ?>

									<?php echo Form::text('twi_url', $auth->socials ? $auth->socials->twi_url : null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('twi_url')); ?></small>
								</div>
								<div class="form-group<?php echo e($errors->has('g_url') ? ' has-error' : ''); ?>">
									<?php echo Form::label('g_url', 'Google Plus Link'); ?>

									<?php echo Form::text('g_url', $auth->socials ? $auth->socials->g_url : null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('g_url')); ?></small>
								</div>
								<div class="form-group<?php echo e($errors->has('link_url') ? ' has-error' : ''); ?>">
									<?php echo Form::label('link_url', 'Linkedin Link'); ?>

									<?php echo Form::text('link_url', $auth->socials ? $auth->socials->link_url : null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('link_url')); ?></small>
								</div>
								<div class="form-group<?php echo e($errors->has('insta_url') ? ' has-error' : ''); ?>">
									<?php echo Form::label('insta_url', 'Instagram Link'); ?>

									<?php echo Form::text('insta_url', $auth->socials ? $auth->socials->insta_url : null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('insta_url')); ?></small>
								</div>
								<div class="form-group<?php echo e($errors->has('pin_url') ? ' has-error' : ''); ?>">
									<?php echo Form::label('pin_url', 'Pinterest Link'); ?>

									<?php echo Form::text('pin_url', $auth->socials ? $auth->socials->pin_url : null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('pin_url')); ?></small>
								</div>
								<div class="form-group<?php echo e($errors->has('brief') ? ' has-error' : ''); ?>">
									<?php echo Form::label('brief', 'About you'); ?>

									<?php echo Form::textarea('brief', null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('brief')); ?></small>
								</div> 
								<div class="form-group<?php echo e($errors->has('website') ? ' has-error' : ''); ?>">
									<?php echo Form::label('website', 'Website Optional'); ?>

									<?php echo Form::text('website', null, ['class' => 'form-control']); ?>

									<small class="text-danger"><?php echo e($errors->first('website')); ?></small>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					<?php echo Form::close(); ?>

					<div class="form-group text-center">
					  <a data-toggle="collapse" href="#changePassword" role="button" aria-expanded="false" aria-controls="changePassword">
				    	Want to change your password?
			  	  </a>
					</div> 
					<div class="collapse" id="changePassword">
          	<h3>Change Password</h3>
						<?php echo Form::model($auth, ['method' => 'POST','action' => ['UserDashboardController@change_password', $auth->id], 'class' => 'submit-deal-form  contact-form']); ?>

					 		<?php echo e(csrf_field()); ?>

					 		<div class="row">
							  <div class="col-md-6 form-group <?php echo e($errors->has('old_password') ? ' has-error' : ''); ?>">
									<label for="old_password">Enter Old Password</label>
									<input type="password" name="old_password" class="form-control" placeholder="Enter Old Password" required>
									<?php if($errors->has('old_password')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('old_password')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
								<div class="col-md-6 form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
									<label for="password">Enter New Password</label>
									<input type="password" name="password" class="form-control" placeholder="Enter New Password" required>
									<?php if($errors->has('password')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
								<div class="col-md-6 form-group <?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
									<label for="password_confirmation">Confirm New Password</label>
									<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password" required>
									<?php if($errors->has('password_confirmation')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password_confirmation')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						<?php echo Form::close(); ?> 
					</div> 	
				</div>
		  </div>
		</div>
	</div>
</section>
<!-- end forum -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
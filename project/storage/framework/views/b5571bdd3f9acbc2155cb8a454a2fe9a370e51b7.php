<div class="acc-block">
	<div class="row">
		<div class="col-sm-3">
			<div class="acc-img">
				<img src="<?php echo e(asset('images/user/'.$auth->image)); ?>" alt="User" class="img-fluid">
			</div>
		</div>
		<div class="col-sm-9">
			<div class="acc-dtl">
		    <h5 class="acc-heading">My Account</h5>
				<p class="user-name"><?php echo e($auth->name); ?></p>
			</div>
		</div>
	</div>
  <div class="sidenav">
		<ul>
			<li><a href="<?php echo e(url('user/account')); ?>" class="<?php echo e(Nav::urlDoesContain('user/account')); ?>" title="My Account">My Account</a></li>
			<li><a href="<?php echo e(url('user/profile-edit')); ?>" class="<?php echo e(Nav::urlDoesContain('user/profile-edit')); ?>" title="Edit Profile">Edit Profile</a></li>
			<li><a href="<?php echo e(route('upload.create')); ?>" title="Add Photo">Submit Photo</a></li>
			<li><a href="<?php echo e(url('user/my-photo')); ?>" class="<?php echo e(Nav::urlDoesContain('user/my-photo')); ?>" title="My photos">My Photos</a></li>
			<li><a href="<?php echo e(url('user/my-collection')); ?>" class="<?php echo e(Nav::urlDoesContain('user/my-collection')); ?>" title="My collection">My Collection</a></li>
			<li><a href="<?php echo e(url('user/followers')); ?>" class="<?php echo e(Nav::urlDoesContain('user/followers')); ?>" title="My Followers">My Followers</a></li>
			<li><a href="<?php echo e(url('user/followings')); ?>" class="<?php echo e(Nav::urlDoesContain('user/followings')); ?>" title="My Followings">My Followings</a></li>
		</ul>
	</div>	
</div>
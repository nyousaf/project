<div class="acc-block text-center">
    <h5 class="acc-heading">My Account</h5>
	<div class="acc-img">
		<img src="<?php echo e(asset('images/user/'.$auth->image)); ?>" alt="User">
	</div>
	<div class="acc-dtl">
		<h3 class="user-name"><?php echo e($auth->name); ?></h3>
		<div class="user-info">
			<p><?php echo e(str_limit($auth->brief,250)); ?></p>
		</div>
	</div>
    <div class="sidenav">
		<ul>
			<li><a href="<?php echo e(url('user/profile-edit')); ?>" "  <?php echo e(Nav::urlDoesContain('user/profile-edit')); ?>" title="Edit Profile">Edit Profile</a></li>
			<li><a href="<?php echo e(url('upload')); ?> <?php echo e(Nav::urlDoesContain('user/upload')); ?>" title="Edit Profile">Submit Image</a></li>
			<li><a href="<?php echo e(url('user/my-photo')); ?> <?php echo e(Nav::urlDoesContain('user/my-photo')); ?>" title="My photos">My Uploads</a></li>
			<li><a href="<?php echo e(url('user/my-collection')); ?>  <?php echo e(Nav::urlDoesContain('user/my-collection')); ?>" title="My collection">My Collection</a></li>
			<li><a href="<?php echo e(url('user/followers')); ?> <?php echo e(Nav::urlDoesContain('user/followers')); ?>" title="My Followers">My Followers</a></li>
			<li><a href="<?php echo e(url('user/followings')); ?>  <?php echo e(Nav::urlDoesContain('user/followings')); ?>" title="My Followings">My Followings</a></li>
		</ul>
	</div>	
</div>
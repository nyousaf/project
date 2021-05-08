
<?php $__env->startSection('content'); ?>



<div class="dashboard-block">
<br>
<br>
    <h4>Edit Page: <?php echo e($user->name); ?></h4>
      <img class="img-rounded" src="<?php echo e(asset('images/user/'.$user->image)); ?>" height="150px" width="200px">
    <hr>
    <form class="col-md-8" action="<?php echo e(route('tax.update',$user->id)); ?>" method="POST" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <?php echo e(method_field('PUT')); ?>

      <label for="name">Name:</label>
      <input required type="text" value="<?php echo e($user->name); ?>" name="name" class="form-control">
      <br>
      <label for="name">Address:</label>
      <input required type="text" value="<?php echo e($user->address); ?>" name="address" class="form-control">
  	   <br>
  	   <label for="name">Email:</label>
      <input required type="email" value="<?php echo e($user->email); ?>" name="email" class="form-control">
      <br>
      <label for="name">Mobile:</label>
      <input required type="text" value="<?php echo e($user->mobile); ?>" name="mobile" class="form-control">
      <br>
      <label for="name">DOB:</label>
      <input required type="date" value="<?php echo e($user->dob); ?>" name="dob" class="form-control">
      <br>
      <label for="name">Gender:</label>
                <?php if($user->sex=='m'): ?>
                  <select class="form-control" name="sex">
                  <option  selected value="m">Male</option>
                  <option value="f">Female</option>
                </select>
                <?php else: ?>

                  <select class="form-control" name="sex">
                  <option value="m">Male</option>
                  <option  selected value="f">Female</option>
                </select>

                <?php endif; ?>

      <br>
      <label for="name">image:</label>

      <input type="file" value="<?php echo e($user->image); ?>" name="image" class="form-control">
      <br>
      <label for="name">Change Password:</label>
      <input type="Password" value="" name="Password" class="form-control">
      <br>
      <label for="name">City :</label>
      <input type="text" name="city" value="<?php echo e($user->city); ?>" class="form-control">
      <br>
      <label for="name">State :</label>
      <input type="text" name="state" value="<?php echo e($user->state); ?>" class="form-control">
      <br>
      <label for="name">Country :</label>
      <input type="text" name="country" value="<?php echo e($user->country); ?>" class="form-control">
      <br>

      
      <input type="submit" value="Update" class="btn btn-success btn-md">
    </form>


  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
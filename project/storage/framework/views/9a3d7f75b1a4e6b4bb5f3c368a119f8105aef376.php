<?php $__env->startSection('content'); ?>
<div class="dashboard-block">
<br>
<br>
      
    <hr>
    <form class="col-md-8" action="<?php echo e(route('txt.sto')); ?>" method="POST" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <label for="name">Name:</label>
      <input required type="text" name="name" class="form-control">
      <br>
      <label for="name">Address:</label>
      <input required type="text"  name="address" class="form-control">
  	   <br>
  	   <label for="name">Email:</label>
      <input required type="email"  name="email" class="form-control">
      <br>
      <label for="name">Mobile:</label>
      <input required type="text"  name="mobile" class="form-control">
      <br>
      <label for="name">DOB:</label>
      <input  type="date"  name="dob" class="form-control">
      <br>
      <label for="name" >Gender:</label>
               <select class="form-control" name="gender">
                <option>Choose Gender</option>
                 <option value="m">Male</option>
                 <option value="f">Female</option>
               </select>

      <br>
      <label for="image">image:</label>

      <input type="file" name="image" class="form-control">
      <br>
      <label for="name"> Password:</label>
      <input type="Password" value="" name="Password" class="form-control">
      <br>
      <label for="name">City:</label>
      <input type="text" value="" name="city" class="form-control">
      <br>
      <label for="name"> State:</label>
      <input type="text" value="" name="state" class="form-control">
      <br>
      <label for="name">Country:</label>
      <input type="text" value="" name="country" class="form-control">
      <br>

      
      <input type="submit" value="Submit" class="btn btn-success btn-md">
    </form>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
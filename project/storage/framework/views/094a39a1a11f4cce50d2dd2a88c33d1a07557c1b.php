<?php $__env->startSection('content'); ?>
   <section class="content-header">
  
   </section>
    
    <div class="content-block box-body table-responsive">
  
      <table id="full_detail_table" class="table table-hover table-responsive">
        <thead>
          <tr class="table-heading-row">
          
                
            
           
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile</th>       
            <th>City</th>            
          
            <th>State</th>
            
        </thead>
        
          <tbody>
            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <?php if(Auth::user()->id != $a->id): ?>
                   <?php if($a->suspended == '1'): ?>
               
                <td><?php echo e($a->name); ?></td>
                <td><?php echo e($a->email); ?></td>
                <td><?php echo e($a->address); ?></td>
                <td><?php echo e($a->mobile); ?> </td>
                <td><?php echo e($a->city); ?></td>
                  <td>
                  
                    <span class="label  label-danger">Suspended</span>
                  <?php else: ?>
                    <!-- <span class="label  label-danger">Suspended</span> -->
                  <?php endif; ?>
                  </td>
                  <?php endif; ?>
               </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        
      </table>
    </div>
  </div>
  <?php $__env->stopSection(); ?>
 


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
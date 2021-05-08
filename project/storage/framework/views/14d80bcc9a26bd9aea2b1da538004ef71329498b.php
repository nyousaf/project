
<?php $__env->startSection('content'); ?>
   <section class="content-header">
  
   </section>
    
    <div class="content-block box-body table-responsive">
   <a class="btn btn-md btn-danger" href="<?php echo e(route('txt.add')); ?>">+Add</a>
      <table id="full_detail_table" class="table table-hover table-responsive">
        <thead>
          <tr class="table-heading-row">
            <th>
              <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>#</th>
           
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile</th>       
            <th>City</th>            
            <th>Action</th>
            
        </thead>
        
          <tbody>
            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <?php if(Auth::user()->id != $a->id): ?>
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($a->id); ?>" id="checkbox<?php echo e($a->id); ?>">
                    <label for="checkbox<?php echo e($a->id); ?>" class="material-checkbox"></label>
                  </div>
                </td>
                <td><?php echo e($a->name); ?></td>
                <td><?php echo e($a->email); ?></td>
                <td><?php echo e($a->address); ?></td>
                <td><?php echo e($a->mobile); ?> </td>
                <td><?php echo e($a->city); ?></td>
               <td> 
                <div class="admin-table-action-block">
                    <a href="<?php echo e(route('tax.edit', $a->id)); ?>" data-toggle="tooltip" data-original-title="Edit" class="btn-info btn-floating"><i class="material-icons">mode_edit</i></a>
                    <!-- Delete Modal -->
                    <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#<?php echo e($a->id); ?>deleteModal"><i class="material-icons">delete</i> </button>
                    <!-- Modal -->
                    <div id="<?php echo e($a->id); ?>deleteModal" class="delete-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading">Are You Sure ?</h4>
                            <p>Do you really want to delete these records? This process cannot be undone.</p>
                          </div>
                          <div class="modal-footer">
                            <?php echo Form::open(['method' => 'DELETE', 'action' => ['UserDashboardController@del', $a->id]]); ?>

                                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            <?php echo Form::close(); ?>

                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <td>
                  <?php endif; ?>
               </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        
      </table>
    </div>
  </div>
  <?php $__env->stopSection(); ?>
 


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
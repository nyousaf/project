<?php $__env->startSection('content'); ?>
  <div class="content-main-block  mrg-t-40">
    <div class="admin-create-btn-block">
      <a href="<?php echo e(route('photos.create')); ?>" class="btn btn-danger btn-md">Add Photos</a>
      <!-- Delete Modal -->
      <a type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#bulk_delete"><i class="material-icons left">delete</i> Delete Selected</a>   
      <!-- Modal -->
      <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
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
              <?php echo Form::open(['method' => 'POST', 'action' => 'WorkController@bulk_delete', 'id' => 'bulk_delete_form']); ?>

                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
              <?php echo Form::close(); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-block box-body table-responsive">
      <table id="full_detail_table" class="table table-hover table-responsive">
        <thead>
          <tr class="table-heading-row">
            <th>
              <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>#</th>
            <th>Image</th>
            <th>Catgeory</th>
            <th>Title</th>
            <th>Description</th>
            <th>Approval</th>       
            <th>Status</th>            
            <th>Timestamp</th>
            <th>Actions</th>
          </tr>
        </thead>
        <?php if(isset($work)): ?>
          <tbody>
            <?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($item->id); ?>" id="checkbox<?php echo e($item->id); ?>">
                    <label for="checkbox<?php echo e($item->id); ?>" class="material-checkbox"></label>
                  </div>
                  <?php echo e($key+1); ?>

                </td>
                <td>
                  <?php if($item->workphotos->first()): ?>
                    <img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-responsive" width="80" height="80" alt="image">
                  <?php else: ?>
                    N/A  
                  <?php endif; ?>
                </td>
                <td><?php echo e($item->categories->title); ?></td>
                <td><?php echo e($item->title); ?></td>
                <td><?php echo e(str_limit($item->desc ? $item->desc : '-',30)); ?></td>
                <td>
                  <?php if($item->status == '0'): ?>
                    <span class="label label-danger">Rejected</span>
                  <?php elseif($item->status == '1'): ?>
                    <span class="label label-success">Approved</span>
                  <?php else: ?>
                    <span class="label label-warning">Pending</span>
                  <?php endif; ?>
                </td>
                <td><?php echo e($item->is_active == '1' ? 'Published' : 'Unpublished'); ?></td>
                <td><?php echo e($item->created_at); ?></td>
                <td>
                  <div class="admin-table-action-block">
                    <a href="<?php echo e(route('photos.edit', $item->id)); ?>" data-toggle="tooltip" data-original-title="Edit" class="btn-info btn-floating"><i class="material-icons">mode_edit</i></a>
                    <!-- Delete Modal -->
                    <button type="button" class="btn-danger btn-floating" data-toggle="modal" data-target="#<?php echo e($item->id); ?>deleteModal"><i class="material-icons">delete</i> </button>
                    <!-- Modal -->
                    <div id="<?php echo e($item->id); ?>deleteModal" class="delete-modal modal fade" role="dialog">
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
                            <?php echo Form::open(['method' => 'DELETE', 'action' => ['WorkController@destroy', $item->id]]); ?>

                                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            <?php echo Form::close(); ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        <?php endif; ?>  
      </table>
      
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
  <?php $__env->startSection('content'); ?>
    <div class="content-main-block mrg-t-40">
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
                  <?php echo Form::open(['method' => 'POST', 'action' => 'ReportImageController@bulk_delete', 'id' => 'bulk_delete_form']); ?>

                    <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                  <?php echo Form::close(); ?>

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
                          </div>#
                        </th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Reported By</th>
                        <th>Reported On</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php $__currentLoopData = $reportfinds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $ri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                              <td>
                                      <div class="inline">
                                        <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($ri->id); ?>" id="checkbox<?php echo e($ri->id); ?>">
                                        <label for="checkbox<?php echo e($ri->id); ?>" class="material-checkbox"></label>
                                      </div>
                                      <?php echo e($key+1); ?>

                              </td>
                          
                            <td>
                                <?php
                                  $work_p = App\WorkPhoto::findorfail($ri->photo_id); 
                                ?>
                              
                                <img src="<?php echo e(url('images/work/'.$work_p->images)); ?>" alt="" width="100px">
                            </td>

                            <td><?php echo e($ri->title); ?></td>
                            <td>
                                <?php
                                  $getusername = App\User::where('id',$ri->user_id)->first()->name;
                                ?>

                                <?php echo e($getusername); ?>

                            </td>
                            <td>
                                <?php echo e(date('d-M-y | h:i A',strtotime($ri->created_at))); ?>

                            </td>
                            <td id="st<?php echo e($ri->id); ?>">
                              <?php if($ri->status == "pending"): ?>
                               <span class="label label-default">Pending</span>
                              <?php elseif($ri->status == "approved"): ?>
                                <span class="label label-success">Approved</span>
                              <?php elseif($ri->status == "cancelled"): ?>
                               <span class="label label-danger">Cancelled</span>
                              <?php endif; ?>
                            </td>

                            <td>
                              <label>Status : </label>
                              <br>
                              <select onchange="updatestatus('<?php echo e($ri->id); ?>')" id="status<?php echo e($ri->id); ?>">
                                <option <?php echo e($ri->status == "pending" ? "selected" : ""); ?> value="pending">Pending</option>
                                <option <?php echo e($ri->status == "approved" ? "selected" : ""); ?> value="approved">Approved</option>
                                <option <?php echo e($ri->status == "cancelled" ? "selected" : ""); ?> value="cancelled">Cancelled</option>
                              </select>
                            </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
          </div>
    </div>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('custom-script'); ?>
      <script>
          function updatestatus(value)
          {
            var id = value;
            var status = $('#status'+id).val();

            // console.log(status);

            $.ajax({
              method : 'GET',
              url : "<?php echo e(url('admin/update/status/report/')); ?>/"+id,
              data : {status : status},
              success : function(data){
                
                $('#st'+id).html('');

                if(data == "pending"){
                  $('#st'+id).append('<label class="label label-default">Pending</label>');
                }else if(data == "approved"){
                  $('#st'+id).append('<label class="label label-success">Approved</label>');
                }else{
                  $('#st'+id).append('<label class="label label-danger">Cancelled</label>');
                }
                

              }
              
            });
          }
      </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
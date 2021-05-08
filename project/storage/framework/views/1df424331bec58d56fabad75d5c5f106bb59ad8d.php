<?php $__env->startSection('content'); ?>
  <div class="content-main-block  mrg-t-40">
        <div class="content-block box-body table-responsive">
                <table id="full_detail_table" class="table table-hover table-responsive">
                  <thead>
                      <th>
                            <tr class="table-heading-row">
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                      </th>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td>
                                <?php
                                  $work_p = App\WorkPhoto::findorfail($item->work_id); 
                                ?>
                                
                                  <img src="<?php echo e(url('images/work/'.$work_p->images)); ?>" alt="" width="100px">
                            </td>
                            <td><?php echo e($item->works->title); ?></td>
                            <td>  
                              <?php echo e(substr(strip_tags($item->body),0,50)); ?><?php echo e(strlen(strip_tags($item->body))>50 ? "..." : ""); ?>

                            </td>
                            <td id="st<?php echo e($item->id); ?>">
                              <?php if($item->status == 0): ?>
                              <span class="label label-default">Pending</span>
                             <?php else: ?>
                             <span class="label label-success">Approved</span>
                             <?php endif; ?>
                            </td>
                            <td>
                              <select onchange="commentstatus('<?php echo e($item->id); ?>')" id="cmt_status<?php echo e($item->id); ?>">
                                  <option <?php echo e($item->status == "1" ? "selected" : ""); ?> value="1">Approved</option>
                                  <option <?php echo e($item->status == "0" ? "selected"  : ""); ?> value="0">Pending</option>
                              </select>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
  <script>
    function commentstatus(value)
    {
      var id = value;
      var status = $('#cmt_status'+id).val();

      $.ajax({
              method : 'GET',
              url : "<?php echo e(url('admin/comment/approve/')); ?>/"+id,
              data : {status : status},
              success : function(data){
                
                $('#st'+id).html('');

                if(data == "0"){
                  $('#st'+id).append('<label class="label label-default">Pending</label>');
                }else{
                  $('#st'+id).append('<label class="label label-success">Approved</label>');
                }
                

              }
              
        });

    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
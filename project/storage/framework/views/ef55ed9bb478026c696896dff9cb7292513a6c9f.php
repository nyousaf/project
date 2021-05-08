<?php $__env->startSection('content'); ?>
  <div class="content-main-block mrg-t-40">
    <div class="admin-create-btn-block">
      <h5><?php echo e($tag->name); ?> Tag <small><?php echo e($tag->work()->count()); ?> Work</small></h5>
    </div>
    <div class="content-block box-body">
      <table class="table table-hover">
        <thead>
          <tr class="table-heading-row">
            <th>#</th>
            <th>Title</th> 
            <th>Tags</th>    
            <th>Actions</th>
          </tr>
        </thead>
        <?php if(isset($tag)): ?>
          <tbody>
            <?php $__currentLoopData = $tag->work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <?php echo e($key+1); ?>

                </td>
                <td><?php echo e($item->title); ?></td>
                <td>
                  <?php $__currentLoopData = $item->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="label label-primary"><?php echo e($tags->title); ?></span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
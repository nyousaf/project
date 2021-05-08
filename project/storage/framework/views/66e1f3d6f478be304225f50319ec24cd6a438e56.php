<?php $__env->startSection('main-content'); ?>
<!--  page banner -->

<!--  end page banner -->
<!-- section -->
<section id="page-section" class="page-main-block">
  <div class="container-flude">               
    <div class="row">
      <div class="col-md-3">
       <div class="main-block-sidenav">
           <?php echo $__env->make('includes.user-tabs', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
      <div class="col-md-9">
        <h3 class="title">My Collection</h3>
        <div class="row">
          <?php if(isset($photo) && count($photo)>0): ?>
            <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($item->workphotos->first()): ?>
                <div class="col-lg-4 img-block">
                  <div class="work-block">
                    <a href="<?php echo e(url('work-dtl/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
                      <img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>"> 
                      <div class="overlay-bg"></div>
                      <a href="#" class="btn btn-white close-btn" data-id="<?php echo e($item->id); ?>" title="Remove"><i class="fa fa-close"></i></a>
                      <a href="#" class="close-btn"><i class="fa fa-close"></i></a> 
                      <div class="item-dtl">
                        <h5 class="item-name"><?php echo e($item->categories->title); ?></h5>
                        <a href="#" class="item-by"><?php echo e($item->users->name); ?></a>
                      </div>
                      <div class="item-btn">
                        <?php if(auth()->guard()->check()): ?>
                          <a href="#" class="btn btn-white img-like <?php echo e($item->isLiked == 1 ? 'active' : null); ?>" data-like="<?php echo e($item->id); ?>" title="like"><i class="fas fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
                        <?php else: ?>
                          <a href="<?php echo e(route('login')); ?>" class="btn btn-white img-like" title="like"><i class="fas fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
                        <?php endif; ?>
                        <a href="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-white img-download" download><i class="fas fa-download"></i><span><?php echo e($item->download); ?></span></a>
                      </div>
                    </a>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
          <?php else: ?>
            <div class="no-block">No Collection Yet</div>
          <?php endif; ?>
        </div>
      </div>
    </div> 
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-scripts'); ?>
<script>
$(document).ready(function(){
  $(".close-btn").click(function(){
      event.preventDefault();
      $(this).closest(".img-block").remove();
      var id = $(this).data('id');
      console.log(id);
       $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "POST",
          url: "<?php echo e(url('filtercollection')); ?>",
          data: {id: id},
          success: function(data){
            console.log(data);
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
                 console.log(XMLHttpRequest);
          }
      }).fail(function() {
        alert( "We are facing some issues currenlty. Please try again later." );
      })
    });
       
   });  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
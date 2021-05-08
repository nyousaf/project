<?php $__env->startSection('main-content'); ?>
<!-- Map -->
<section id="page-section" class="page-main-block">
  <div class="container">               
    <div class="row">
      <div class="col-md-12">
        <div class="account-main-block">
          <div class="row">
            <div class="col-md-4">
              <div class="profile-block text-center">
                <div class="profile-img">
                  <img src="<?php echo e(asset('images/user/'.$user->image)); ?>" alt="User">
                </div>
               
            <?php if(isset($paypalid) && $paypalid!=""): ?>
                <button type="button" id="coffee-btn" class="btn btn-success btn-sm"><a style="color:white;" target="_blank" href="<?php echo e(url($paypalid)); ?>">Coffee</a></button>
                <?php endif; ?>
                 <?php if(auth()->guard()->check()): ?>
                  <button type="button" id="follow-btn" class="btn btn-outline-info btn-sm " data-follow="<?php echo e($user->id); ?>"><?php echo e($user->followers()->where('follower_id', $auth->id)->first() ? 'Unfollow' : 'Follow'); ?></button>
                <?php else: ?>
                 <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-info btn-sm">Follow</a>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-8">
              <div class="profile-dtl">
                <h6 class="text-capitalize" ><?php echo e($user->name); ?></h6>
                <div >Joined on <?php echo e($user->created_at->format('jS F, Y')); ?></div>
                <p><?php echo e($user->brief); ?></p>
                <ul>
                  <li><i class="fa fa-picture-o"></i> Photos : <?php echo e($user->works->count()); ?></li>
                  <li><i class="fa fa-heart"></i> Collection : <?php echo e($user->user_favorites->count()); ?></li>
                  <li><i class="fa fa-users"></i> Followers : <?php echo e($user->followers->count()); ?></li>
                  <li><i class="fa fa-male"></i> Followings : <?php echo e($user->followings->count()); ?></li>
                  
              </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 work-main-block">
        <div class="row grid">            
          <?php if(isset($photo) && count($photo)>0): ?>
            <?php $__currentLoopData = $photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-lg-4 work-img-block">
                <div class="work-block">
                  <a href="<?php echo e(url('photos/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>"> 
                    <?php if($item->workphotos->first()): ?>
                      <img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">
                    <?php else: ?>
                      <img src="<?php echo e(asset('images/work/default.jpg')); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">
                    <?php endif; ?>
                    <div class="overlay-bg"></div>
                    <?php if($item->status == '2'): ?>
                      <div class="work-action-block">
                        <a href="<?php echo e(route('upload.edit', $item->id)); ?>" class="btn btn-danger">Edit</a> 
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
                                <?php echo Form::open(['method' => 'DELETE', 'action' => ['UploadController@destroy', $item->id]]); ?>

                                    <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                <?php echo Form::close(); ?>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?> 
                    <div class="item-dtl">
                      <h5 class="item-name"><?php echo e($item->categories->title); ?></h5>
                      <a href="#" class="item-by"><?php echo e($item->users->name); ?></a>
                    </div>
                    <div class="item-btn">
                      <?php if(auth()->guard()->check()): ?>
                        <a href="#" class="btn btn-white img-like <?php echo e($item->isLiked == 1 ? 'active' : null); ?>" data-like="<?php echo e($item->id); ?>" title="like"><i class="fa fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
                      <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-white img-like" title="like"><i class="fa fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
                      <?php endif; ?>
                      <?php if($item->workphotos->first()): ?>
                        <a href="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-white img-download" download><i class="fa fa-download"></i><span><?php echo e($item->download); ?></span></a>
                      <?php endif; ?>
                    </div>
                  </a>
                  <?php if($item->status == 0): ?> 
                    <div class="label label-warning">Rejected</div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
          <?php else: ?>
            <div class="no-block">No Photos Yet</div>
          <?php endif; ?>
        </div>
      </div>
    </div> 
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-scripts'); ?>
<script>
var urlLike = '<?php echo e(route('user.follow')); ?>';
var userId=null;var status=null;
$('[data-follow]').on('click', function(e) {
    // e.preventDefault();
    var self = $(this),
    userId = self.data('follow');
    status = self.text().trim();       
    console.log(status);
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: urlLike,
        data: {userId: userId, status: status},
        success: function (data) {       
            console.log(data);  
          },
        error: function(e,r,t){
          console.log(e)
        }
    }).done(function(data) {
        // $('#count').html(data.current_count);
        if ($("#follow-btn").html() == "Follow") {
        $("#follow-btn").html('Unfollow');
        }
       else {
       $("#follow-btn").html('Follow');
       }
    }).fail(function() {
      alert( "We are facing some issues currenlty. Please try again later." );
    })
});
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
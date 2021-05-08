
<?php $__env->startSection('main-content'); ?>
<!-- product -->
<section id="product-section" class="product-main-block">
	<div class="container">
		<?php if(isset($work)): ?>
			<div class="row">
				<div class="<?php echo e($settings->sidebar_left == 1 ? 'col-lg-9 col-md-8 order-last' : 'col-lg-9 col-md-8'); ?>">
					<div class="product-block">
	          <?php if(isset($work->workphotos)): ?>
              <div class="product-img">
              	<img src="<?php echo e(asset('images/work/'.$work->workphotos->first()->images)); ?>" class="img-fluid" alt="product-img">
              </div>
			      <?php endif; ?>
		        <div class="product-dtl">
	            <div class="product-heading">
	            	<h4 class="product-title"><?php echo e($work->title); ?></h4>
	            	<div class="product-sub-heading"><?php echo e($work->categories->title); ?></div>
	            </div>
	            <div class="product-desc">
	              <p><?php echo e($work->desc); ?></p> 
	            </div>
          	</div>
          </div> 
          <?php if($work->status == '1'): ?>
	          <div class="post-reply-form-main">
							<h6 class="post-heading">Leave A Comment</h6>
							<div class="row">
								<div class="col-lg-2 text-center">
									<div class="post-profile-img">
										<?php if(auth()->guard()->check()): ?>
											<img src="<?php echo e(asset('images/user/'.$auth->image)); ?>" class="img-fluid" alt="<?php echo e($auth->title); ?>">
										<?php else: ?>
											<img src="<?php echo e(asset('images/user/user.png')); ?>" class="img-fluid" alt="user-img">
										<?php endif; ?>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="post-form-block">
										<form id="post-form" class="post-form" action="<?php echo e(action('UserDashboardController@comment')); ?>" method="POST">
	            				<?php echo e(csrf_field()); ?>

											<input type="hidden" value="<?php echo e($work->id); ?>" name="work_id">
											<div class="form-group">
												<textarea id="summernote-main" name="body" class="summernote-main form-control"></textarea>
											</div>
	                    <?php if(auth()->guard()->check()): ?>
												<button type="submit" class="btn btn-primary">Submit</button>
											<?php else: ?>
												<a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Submit</a>
											<?php endif; ?>
				            </form>
									</div>
								</div>
							</div>
						</div>
		        <?php if(isset($work->comments)): ?>
							<?php $__currentLoopData = $work->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="post-block post-reply">
									<div class="row">
										<div class="col-lg-2 col-md-3">
											<div class="post-author-block">
												<div class="post-profile-img">
													<img src="<?php echo e(asset('images/user/'.$comment->users->image)); ?>" class="img-fluid" alt="user-img">
												</div>
											</div>
										</div>
										<div class="col-lg-10 col-md-9">
											<div class="post-body-block">
												<a href="<?php echo e(url('profile/'.$comment->users->uni_id.'/'.str_slug($comment->users->name,'-'))); ?>" title="<?php echo e($comment->users->name); ?>"><h6 class="post-author"><?php echo e($comment->users->name); ?></h6></a>
												<div class="post-body-content">		
													<p><?php echo $comment->body; ?></p>
												</div>
												<div class="post-time text-right"><i class="far fa-clock"></i>Posted <?php echo e($comment->created_at->diffforhumans()); ?>

												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					<?php endif; ?>
		    </div>
        <div class="col-lg-3 col-md-4"> 
	        <div class="widget-block profile-widget">
	        	<div class="widget-profile-img">
              <img src="<?php echo e(asset('images/user/'.$work->users->image)); ?>" alt="User">
            </div>
            <div class="widget-profile-dtl">
	            <a href="<?php echo e(url('profile/'.$work->users->uni_id.'/'.str_slug($work->users->name,'-'))); ?>"><div class="widget-username"><?php echo e($work->users->name); ?></div></a>
	           	<div class="widget-photos"> <?php echo e($work->users->works->count()); ?> Photos</div>
	            <?php if(auth()->guard()->check()): ?>
	              <button type="button" id="follow-btn" class="btn btn-primary widget-follow-btn" data-follow="<?php echo e($work->users->id); ?>"><?php echo e($work->users->followers()->where('follower_id', $auth->id)->first() ? 'Unfollow' : 'Follow'); ?></button>
	            <?php else: ?>
	              <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Follow</a>
	            <?php endif; ?>
	          </div>
	        </div>  
	        <?php if($work->status == '1'): ?>
	        	<div class="widget-block btn-widget">
							<div class="joint-btn">
								<?php if(auth()->guard()->check()): ?>
	              	<a href="#" class="btn btn-primary img-like <?php echo e($work->isLiked == 1 ? 'active' : null); ?>" data-like="<?php echo e($work->id); ?>"
	              	 title="Like"><i class="fa fa-heart"></i> <span><?php echo e($work->likes()->count()); ?></span></a>
	              	<a href="#" class="btn btn-primary img-fav <?php echo e($work->isFavorite == 1 ? 'active' : null); ?>" data-fav="<?php echo e($work->id); ?>" title="Collection"><i class="fa fa-plus"></i> <span><?php echo e($work->favorites()->count()); ?></span> </a>
	              <?php else: ?>
	              	<a href="<?php echo e(route('login')); ?>" class="btn btn-primary" title="like"><i class="fa fa-heart"></i> <span><?php echo e($work->likes()->count()); ?></span></a>
	              	<a href="<?php echo e(route('login')); ?>" class="btn btn-primary" title="Collection"><i class="fa fa-plus"></i> <span><?php echo e($work->favorites()->count()); ?></span> </a>
	              <?php endif; ?>
	              <a href="<?php echo e(asset('images/work/'.$work->workphotos->first()->images)); ?>" data-id="<?php echo e($work->id); ?>" class="btn btn-primary img-download" download><i class="fa fa-download"></i> <span><?php echo e($work->download); ?></span> </a>
								<?php														
									$facebook = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->facebook();
									$twitter = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->twitter();
									$gplus = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->gplus();
									$linkedin = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->linkedin();
									$pinterest = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->pinterest();
								?>
	              <div class="share-button">
	              	<a class="btn btn-primary share-btn"><i class="fa fa-share-alt"></i></a>
									<div class="social-icon top sharer">
										<a class="facebook-icon" href="<?php echo e($facebook); ?>"><i class="fab fa-facebook-f"></i></a>
										<a class="google-icon" href="<?php echo e($gplus); ?>"><i class="fab fa-google-plus"></i></a>
									  <a class="twitter-icon" href="<?php echo e($twitter); ?>"><i class="fab fa-twitter"></i></a>
									  <a class="pinterest-icon" href="<?php echo e($pinterest); ?>"><i class="fab fa-pinterest"></i></a>
									  <a class="linkedin-icon" href="<?php echo e($linkedin); ?>"><i class="fab fa-linkedin"></i></a>
									</div>
								</div>
	            </div>
		        </div>
		      <?php endif; ?>
		      <div class="widget-block info-widget">
		        <table class="info-table">
            	<tbody class="info">
            		<?php if($work->type): ?>
	          			<tr>
	          				<th>Image Type</th>
	          				<td><?php echo e($work->type); ?> </td>
	          			</tr>
	          		<?php endif; ?>
	          		<?php if($work->width && $work->length): ?>
	          			<tr>
	          				<th>Resolution</th>
	          				<td><?php echo e($work->width); ?> * <?php echo e($work->length); ?></td>
	          			</tr>
          			<?php endif; ?>
          			<tr>
          				<th>Views</th>
          				<td><?php echo e($work->views()->count()); ?></td>
          			</tr>
          			<?php if($work->model): ?>
	          			<tr>
	          				<th>Model</th>
	          				<td><?php echo e($work->model); ?></td>
	          			</tr>
	          		<?php endif; ?>
	          		<?php if($work->aperture): ?>
	          			<tr>
	          				<th>Aperture</th>
	          				<td><?php echo e($work->aperture); ?></td>
	          			</tr>
	          		<?php endif; ?>
	          		<?php if($work->iso): ?>
	          			<tr>
	          				<th>ISO</th>
	          				<td><?php echo e($work->iso); ?></td>
	          			</tr>
	          		<?php endif; ?>
	          		<?php if($work->focal_len): ?>
	          			<tr>
	          				<th>Focal Length</th>
	          				<td><?php echo e($work->focal_len); ?></td>
	          			</tr>
	          		<?php endif; ?>
	          		<?php if($work->shutter_speed): ?>
	          			<tr>
	          				<th>Shutter Speed</th>
	          				<td><?php echo e($work->shutter_speed); ?></td>
	          			</tr>
	          		<?php endif; ?>
	          		<?php if($work->taken_date): ?>
	          			<tr>
	          				<th>Clicked On</th>
	          				<td><?php echo e($work->taken_date); ?></td>
	          			</tr>
	          		<?php endif; ?>
          			<tr>
          				<th>Posted</th>
          				<td><?php echo e($work->created_at->diffForHumans()); ?></td>
          			</tr>
            	</tbody>
            </table> 
		      </div>
		      <div class="widget-block tag-widget">		        
						<?php if(isset($tags) && count($tags)>0): ?>
							<div class="tagcloud">
		            <h6 class="widget-heading">Tag Widget</h6>
		            <div class="tags">		            	
									<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              	<a href="<?php echo e(url('search/'.$tag->slug)); ?>"><span class="badge"><?php echo e($tag->title); ?></span></a>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </div>       
		        	</div>
		        <?php endif; ?>
		      </div>
        	<div class="widget-block category-widget">
        		<?php if(isset($category) && count($category)>0): ?>
            	<h6 class="widget-heading">Categories</h6>
            	<div class="row">
								<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-lg-4 cat-block">
            				<div class="widget-category-content">
											<a href="<?php echo e(url('category/'.$cat->slug)); ?>" title="<?php echo e($cat->title); ?>">	<img src="<?php echo e(asset('images/category/'.$cat->image)); ?>" class="img-fluid" alt="<?php echo e($cat->title); ?>">
												<div class="widget-cat-title"><?php echo e($cat->title); ?></div>
											</a>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            	</div>
            <?php endif; ?>
        	</div> 
		    </div>
		  </div>
		<?php endif; ?>
	</div> 
	<?php if($work->status == '1'): ?>
		<div class="container">
			<div class="related-images-block">
				<?php if(isset($cat_img)): ?>
					<h4 class="related-heading"> Related Images</h4>
				  <div class="row grid">
						<?php $__currentLoopData = $cat_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($item->workphotos->first()): ?>
								<div class="col-lg-3 work-img-block">
									<div class="work-block">
										<a href="<?php echo e(url('photos/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
											<img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">	
											<div class="overlay-bg"></div>
											<div class="item-dtl">
												<h5 class="item-name"><?php echo e($item->categories->title); ?></h5>
												<a href="#" class="item-by"><?php echo e($item->users->name); ?></a>
											</div>
											<div class="item-btn">
												<?php if(auth()->guard()->check()): ?>
	                      	<a href="#" class="btn btn-white img-like <?php echo e($item->isLiked == 1 ? 'active' : null); ?>" data-like="<?php echo e($item->id); ?>" title="Like"><i class="fa fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
	                      	<a href="#" class="btn btn-white img-fav <?php echo e($item->isFavorite == 1 ? 'active' : null); ?>" data-fav="<?php echo e($item->id); ?>" title="Collection"><i class="fa fa-plus"></i> <span><?php echo e($item->favorites()->count()); ?></span></a>
	                      <?php else: ?>
	                      	<a href="<?php echo e(route('login')); ?>" class="btn btn-white img-like" title="like"><i class="fas fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
	                      	<a href="<?php echo e(route('login')); ?>" class="btn btn-white img-fav" title="Collection"><i class="fa fa-plus"></i> <span><?php echo e($item->favorites()->count()); ?></span></a>
	                      <?php endif; ?>
												<a href="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-white img-download" title="Download" download><i class="fa fa-download"></i><span><?php echo e($item->download); ?></span></a>
											</div>
										</a>
									</div>
								</div>
							<?php endif; ?>
					  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  </div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
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
<?php $__env->startSection('main-content'); ?>
<!--  page banner -->

<!--  end page banner -->
<!-- product -->
<section id="product-section" class="product-main-block">
	<div class="container-fluid">
		<?php if(isset($work)): ?>
			<div class="row">
				<div class="col-lg-9">
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
	                
	        <?php if(isset($work->comments)): ?>
						<?php $__currentLoopData = $work->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="post-block post-reply">
								<div class="row">
									<div class="col-lg-2">
										<div class="post-author-block">
											<div class="profile-img">
												<img src="<?php echo e(asset('images/user/'.$comment->users->image)); ?>" class="img-fluid" alt="user-img">
											</div>
										</div>
									</div>
									<div class="col-lg-10">
										<div class="post-body-block">
											<h6 class="post-author"><a href="<?php echo e(url('profile/'.$comment->user_id)); ?>" title="<?php echo e($comment->users->name); ?>"><?php echo e($comment->users->name); ?></a></h6>
											<div class="post-time text-right"><i class="far fa-clock"></i>Posted <?php echo e($comment->created_at->diffforhumans()); ?>

											</div>
											<div class="post-body-content">		
												<p><?php echo $comment->body; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<div class="post-reply-form-main">
						<div class="row">
							<div class="col-lg-2 text-center">
								<div class="profile-img">
									<?php if(auth()->guard()->check()): ?>
										<img src="<?php echo e(asset('images/user/'.$auth->image)); ?>" class="img-fluid" alt="<?php echo e($auth->title); ?>">
									<?php else: ?>
										<img src="<?php echo e(asset('images/user/user.png')); ?>" class="img-fluid" alt="user-img">
									<?php endif; ?>
								</div>
							</div>
							<div class="col-lg-10">
								<div class="post-body-block">
									<h6 class="post-heading">Reply to this post</h6>
									<form id="post-form" class="post-form" action="<?php echo e(action('UserDashboardController@comment')); ?>" method="POST">
            				<?php echo e(csrf_field()); ?>

										<input type="hidden" value="<?php echo e($work->id); ?>" name="work_id">
										<div class="form-group">
											<textarea id="summernote-main" name="body" class="summernote-main form-control"></textarea>
										</div>
                    <?php if(auth()->guard()->check()): ?>
											<button type="submit" class="btn btn-primary">Submit</button>
										<?php else: ?>
											<a href="<?php echo e(route('\login')); ?>" class="btn btn-primary">Submit</button>
										<?php endif; ?>
			            </form>
								</div>
							</div>
						</div>
					</div>
		    </div>
        <div class="col-lg-3"> 
        	<div class="widget-block btn-widget">
						<div class="joint-btn">
							<?php if(auth()->guard()->check()): ?>
              	<a href="#" class="btn btn-primary img-like <?php echo e($work->isLiked == 1 ? 'active' : null); ?>" data-like="<?php echo e($work->id); ?>"
              	 title="Like"><i class="fas fa-heart"></i> <span><?php echo e($work->likes()->count()); ?></span> Like</a>
              	<a href="#" class="btn btn-primary img-fav <?php echo e($work->isFavorite == 1 ? 'active' : null); ?>" data-fav="<?php echo e($work->id); ?>" title="Collection"><i class="fas fa-plus"></i> <span><?php echo e($work->favorites()->count()); ?></span> Collect</a>
              <?php else: ?>
              	<a href="<?php echo e(route('login')); ?>" class="btn btn-primary img-like" title="like"><i class="fas fa-heart"></i> <span><?php echo e($work->likes()->count()); ?></span> Like</a>
              	<a href="<?php echo e(route('login')); ?>" class="btn btn-primary img-fav" title="Collection"><i class="fas fa-plus"></i> <span><?php echo e($work->favorites()->count()); ?></span> Collect</a>
              <?php endif; ?>
              <a href="<?php echo e(asset('images/work/'.$work->workphotos->first()->images)); ?>" data-id="<?php echo e($work->id); ?>" class="btn btn-primary main-img-download" download><i class="fas fa-download"></i> <span><?php echo e($work->download); ?></span> Download</a>
            </div>
	        </div> 
	        <div class="widget-block info-widget">
	        	<div class="profile-img">
                  <img src="<?php echo e(asset('images/user/'.$work->users->image)); ?>" alt="User">
            </div>
            <?php if(auth()->guard()->check()): ?>
              <button type="button" id="follow-btn" class="btn btn-primary" data-follow="<?php echo e($work->users->id); ?>"><?php echo e($work->users->followers()->where('follower_id', $auth->id)->first() ? 'Unfollow' : 'Follow'); ?></button>
            <?php else: ?>
              <a href="<?php echo e(route('/login')); ?>" class="btn btn-primary">Follow</button>
            <?php endif; ?>

            <h6 class="username"><?php echo e($work->users->name); ?></h6>
           <h6 class="username"> <?php echo e($work->users->works->count()); ?></h6>
           
	        </div>  
        	<div class="widget-block category-widget">
        		<?php if(isset($category) && count($category)>0): ?>
            	<h6 class="widget-heading">Categories</h6>
            	<div class="category-content">
            		<ul>            	
									<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                <li><a href="<?php echo e(url('category/'.$cat->id)); ?>"><i class="fas fa-caret-right"></i><?php echo e($cat->title); ?></a></li>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              	</ul>
            	</div>
            <?php endif; ?>
        	</div> 
		      <div class="widget-block tag-widget">		        
						<?php if(isset($tags) && count($tags)>0): ?>
							<div class="tagcloud">
		            <h6 class="widget-heading">Tag Widget</h6>
		            <div class="tags">		            	
									<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              	<a href="<?php echo e(url('tag/'.$tag->id)); ?>"><span class="badge"><?php echo e($tag->title); ?></span></a>
		              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </div>       
		        	</div>
		        <?php endif; ?>
		          <table>
            	<tbody class="info">
          			<tr>
          				<th>Image Type</th>
          				<td>jpg</td>
          			</tr>
          			<tr>
          				<th>Image Size</th>
          				<td>200kb</td>
          			</tr>
          			<tr>
          				<th>Resolution</th>
          				<td>6720×4480</td>
          			</tr>
          			<tr>
          				<th>Uploaded</th>
          				<td>3 days ago</td>
          			</tr>
          			<tr>
          				<th>Views</th>
          				<td>49349</td>
          			</tr>
          			<tr>
          				<th>Downloads</th>
          				<td>31505</td>
          			</tr>
            	</tbody>
            </table> 
		      </div>
		    </div>
		  </div>
		<?php endif; ?>
	</div>
	<div class="container-flude">
		<div class="releted-images-block">
			<h4 class="releted-heading"> Releted Image</h4>
		  <div class="row">
			    <div class="col-md-2">
			      <div class="thumbnail">
			          <img src="lights.jpg" alt="img" style="width:100%"> 
			      </div>
			    </div>
			    <div class="col-md-2">
			      <div class="thumbnail">
			          <img src="lights.jpg" alt="img" style="width:100%"> 
			      </div>
			    </div>
			    <div class="col-md-2">
			      <div class="thumbnail">
			          <img src="lights.jpg" alt="img" style="width:100%"> 
			      </div>
			    </div>
			    <div class="col-md-2">
			      <div class="thumbnail">
			          <img src="lights.jpg" alt="img" style="width:100%"> 
			      </div>
			    </div>
			    <div class="col-md-2">
			      <div class="thumbnail">
			          <img src="lights.jpg" alt="img" style="width:100%"> 
			      </div>
			    </div>
			    <div class="col-md-2">
			      <div class="thumbnail">
			          <img src="lights.jpg" alt="img" style="width:100%"> 
			      </div>
			    </div>
		    </div>
	  </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
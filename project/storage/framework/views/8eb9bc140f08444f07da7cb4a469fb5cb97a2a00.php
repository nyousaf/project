
<?php $__env->startSection('main-content'); ?>
<!-- slider start -->
<section id="slider-section" class="slider-main-block parallax" style="background-image: url(<?php echo e(asset('images/slider-01.jpg')); ?>)">
	<div class="overlay-bg"></div>
	<div class="container">
		<div class="slider-block">
			<div class="slider-dtl">
				<h1 class="slider-heading"><?php echo e($general->w_name ? $general->w_name : 'Logo'); ?></h1>
				<p><?php echo e($general->footer_text); ?></p>
			</div>
			<div class="search-block">
				<?php echo Form::open(['method' => 'GET', 'action' => 'SearchController@homeSearch', 'class' => 'search-form']); ?>

					<?php echo Form::text('search', null, ['class' => 'search-input', 'placeholder' => 'Search']); ?>

				  <button type="submit" class="search-button"><i class="fa fa-search"></i>
				  </button>
			  <?php echo Form::close(); ?>

		  </div>
			
		</div>
	</div>	
</section>
<!-- slider end -->
<!-- work -->
<section id="work-section" class="work-main-block">
	<div class="container">
		<?php if(isset($work) && count($work)>0): ?>
			<div class="work-sec-dtl">
				<ul class="work-filter text-center">  
	        <li><a href="<?php echo e(url('/')); ?>" class="filter-featured active">Featured</a></li> 
	        <li><a href="<?php echo e(url('/trending')); ?>" class="filter-trending">Trending</a></li>
	        <li><a href="<?php echo e(url('/all')); ?>" class="filter-all">All</a></li>
	    	</ul>
				<div class="row grid">
					<?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($item->workphotos->first()): ?>
							<div class="col-lg-4 work-img-block">
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
                      	<a href="<?php echo e(route('login')); ?>" class="btn btn-white img-like" title="like"><i class="fa fa-heart"></i> <span><?php echo e($item->likes()->count()); ?></span></a>
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
				<div id="results"><!-- results appear here --></div>
  			<div class="ajax-loading text-center"><i class="fa fa-spinner fa-spin" style="font-size:40px"></i></div>	
			</div>	
		<?php endif; ?>		
	</div><!-- <a href="#" id="loadMore" class="btn btn-primary">Load More</a>
				<p class="totop"> 
    <a href="#top">Back to top</a> 
</p> -->
</section>
<!-- end work -->
<?php if($settings->is_category): ?>
	<section id="cat-section" class="cat-main-block">
		<div class="container text-center">
			<h4 class="cat-heading">Explore Our Categories</h4>
			<?php if(isset($category) && count($category)>0): ?>
				<div class="row">
					<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-lg-2 cat-block">
							<div class="category-content">
								<a href="<?php echo e(url('category/'.$cat->slug)); ?>" title="<?php echo e($cat->title); ?>"><img src="<?php echo e(asset('images/category/'.$cat->image)); ?>" class="img-fluid" alt="<?php echo e($cat->title); ?>">
									<div class="cat-title"><?php echo e($cat->title); ?></div>
								</a>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-scripts'); ?>
<script>
$(document).ready(function(){
	var page = 1; 
	var stop = false;
	$(window).scroll(function() { //detect page scroll
    if($(window).data('ajax_in_progress') == true){
      return;
    }
    else{
    	if (stop == false) {
		    if((($(window).scrollTop() + $(window).height()) - $("#footer").offset().top)>0) {
		      page++; //page number increment
		      load_more(page); //load content 
			    $(window).data('ajax_in_progress', true);
		    }
		  }
		}
	});     
	function load_more(page){
		$.ajax({
    	headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
      type: "GET",
      url: '?page=' + page,
      datatype: "html",
      beforeSend: function()
      {
        $('.ajax-loading').show();
      },
    	success: function(data){
      	console.log(data);
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
  }).done(function(data)
  {
    if(data.length == 0){
      $('.ajax-loading').html("No more data");
      stop = true;
  		return;
    }
    else{
      $('.ajax-loading').hide(); 
      // $("#results").append(data).fadeIn(); //append data into #results element 
  		var el = $(data).find('.work-img-block');
			$(".grid").append(el).masonry( 'appended', el, true );
	    // fix layout after image has been loaded
	    el.imagesLoaded().progress( function() {
	      $(".grid").masonry();
	    });
			$(window).data('ajax_in_progress', false);
   	}        
  }).fail(function(jqXHR, ajaxOptions, thrownError){
    alert( "We are facing some issues currenlty. Please try again later." );
  });
}     
});  
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
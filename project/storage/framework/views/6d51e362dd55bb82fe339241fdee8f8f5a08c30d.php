<?php $__env->startSection('main-content'); ?>
<!-- slider start -->
<section id="slider-section" class="slider-main-block" style="background-image: url(<?php echo e(asset('images/banner.jpg')); ?>)">
	<div class="overlay-bg"></div>
	<div class="container">
		<div class="slider-block text-center">
			<div class="slider-dtl">
				<h1 class="slider-heading">Art Is What You Make It</h1>
				<p>WordPress themes, web templates and more. Brought to you by the largest global community of creatives.</p>
			</div>
			<div class="slider-btn">
				<a href="#" class="btn btn-primary" title="">Explore Now</a>
			</div>
		</div>
	</div>
</section>
<!-- slider end -->
<!-- work -->
<section id="work-section" class="work-main-block">
	<div class="container">
		<div class="section text-center">
			<h2 class="section-heading">Work</h2>
			<p>Hand-pick some of the best new art from our collection. These beautiful templates are making our heads turn!</p>
		</div>
		<?php if(isset($work) && count($work)>0): ?>
			<div class="work-sec-dtl">
				<div class="row grid">
					<?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($item->workphotos->first()): ?>
							<div class="col-lg-4 work-img-block">
								<div class="work-block">
									<a href="<?php echo e(url('work-dtl/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
										<img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">	
										<div class="overlay-bg"></div>
										<div class="item-dtl">
											<h5 class="item-name"><?php echo e($item->categories->title); ?></h5>
											<div class="like-btn"><a href="#" class="btn btn-white" data-id="<?php echo e($item->id); ?>"><i class="fas fa-heart"></i> <span><?php echo e($item->like_count); ?></span></a></div>
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
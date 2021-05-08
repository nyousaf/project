<?php $__env->startSection('main-content'); ?>
<!-- slider start -->
<section id="slider-section" class="slider-main-block parallax" style="background-image: url(<?php echo e(asset('images/slider-01.jpg')); ?>)">
	<div class="overlay-bg"></div>
	<div class="container-fluid">
		<div class="slider-block">
			<div class="slider-dtl">
				<h1 class="slider-heading">Sealife</h1>
				<p>Marine life, or sea life or ocean life, is the plants, animals and other organisms that live in the salt water of the sea or ocean, or the brackish water of coastal estuaries. At a fundamental level, marine life affects the nature of the planet.</p>
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
	<!-- <div class="container-fluid">
		
			<div class="work-sec-dtl">
				<ul class="work-filter text-center">  
	        <li><a href="<?php echo e(url('/')); ?>" class="<?php echo e(Request::is('/') ? 'active' : ''); ?> filter-featured">Featured</a></li> 
	        <li><a href="<?php echo e(url('/trending')); ?>" class="<?php echo e(Request::is('trending') ? 'active' : ''); ?> filter-trending">Trending</a></li>
	        <li><a href="<?php echo e(url('/all')); ?>" class="<?php echo e(Request::is('all') ? 'active' : ''); ?> filter-all">All</a></li>
	    	</ul>
				<div class="row grid">
					<?php if(isset($work) && count($work)>0): ?>
					<?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($item->workphotos->first()): ?>

   
          
						
 <div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">

     <img src="" class="img-fluid" id="imgid" alt=""/>	
   <p id="p"> </p>
        </div>
        <div class="modal-footer">
          <button type="button " class="btn btn-outline-info btn_sm" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
  </div> -->
  <!-- <div class="col-lg-4 work-img-block">
		<div class="work-block">
		<a href="<?php echo e(url('photos/'.$item->uni_id.'/'.$item->slug)); ?>" title="<?php echo e($item->title); ?>">
		<img src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" class="img-fluid" alt="<?php echo e($item->title); ?>">	
		<div class="overlay-bg"></div>
		<div class="item-dtl">
		<h5 class="item-name"><?php echo e($item->categories->title); ?></h5>
			<a href="<?php echo e(url('profile/'.$item->users->uni_id.'/'.str_slug($item->users->name,'-'))); ?>" class="item-by"><?php echo e($item->users->name); ?></a>
			</div>
			<div class="item-btn">
		<?php if(auth()->guard()->check()): ?>
    <a href="#" class="btn btn-white img-like <?php echo e($item->isLiked == 1 ? 'active' : null); ?>" data-like="<?php echo e($item->id); ?>" title="Like"><i class="fa fa-heart"></i><span><?php echo e($item->likes()->count()); ?></span></a>
    <a href="#" class="btn btn-white img-fav <?php echo e($item->isFavorite == 1 ? 'active' : null); ?>" data-fav="<?php echo e($item->id); ?>" title="Collection"><i class="fa fa-plus"></i><span><?php echo e($item->favorites()->count()); ?></span></a>
     <?php else: ?>
     <a href="<?php echo e(route('login')); ?>" class="btn btn-white img-like" title="like"><i class="fa fa-heart"></i><span><?php echo e($item->likes()->count()); ?></span></a>
     <a href="<?php echo e(route('login')); ?>" class="btn btn-white img-fav" title="Collection"><i class="fa fa-plus"></i><span><?php echo e($item->favorites()->count()); ?></span></a>
      <?php endif; ?>
		<a href="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-white img-download" title="Download" download><i class="fa fa-download"></i><span><?php echo e($item->download); ?></span></a>

    <a data-toggle="modal" href="#myModal" data-title="<?php echo e($item->title); ?>" data-src="<?php echo e(asset('images/work/'.$item->workphotos->first()->images)); ?>" data-id="<?php echo e($item->id); ?>" class="btn btn-white imag" title="Zoom"><i class="fa fa-eye"></i></a>
				</div>
			</a>
				</div>
				</div>
					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
				
				<div id="results"> results appear here -->
				<!-- </div>
  			<div class="ajax-loading text-center"><i class="fa fa-spinner fa-spin" style="font-size:40px"></i></div>
  			<?php else: ?>
  			<div class="col-12 text-center"><h4>No Image Available</h4></div>
  			<?php endif; ?>	
			</div>

			
	</div>
	 -->
	
	<!-- <a href="#" id="loadMore" class="btn btn-primary">Load More</a>
				<p class="totop"> 
    <a href="#top">Back to top</a> 
</p> -->
<!-- </section> -->
<!-- end work -->
<!-- <?php if(isset($ad_settings)): ?>
<?php if($ad_settings->home_flag): ?>
<section id="cat-section" class="cat-main-block">
		<div class="container-fluid" >
<div data-id='<?php echo e($ad_settings->Embedd_code); ?>'
  class='sstk_widget' style="width: 100%">
  <a href='http://affiliate.shutterstock.com' target='_blank'
  style='position: absolute;bottom: 0px; width: 100%; line-height: 40px; text-decoration: none;color: #333333; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size: 12px;'>
</a>
</div>
</div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php if($settings->is_category): ?>
	<section id="cat-section" class="cat-main-block">
		<div class="container text-center">
			<h4 class="cat-heading">Explore Our Categories</h4>
			<?php if(isset($category) && count($category)>0): ?>				
				<div id="category-slider" class="owl-carousel">
				<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>					
					<div class="item">
						<div class="cat-block">
							<div class="category-content">
								<a href="<?php echo e(url('category/'.$cat->slug)); ?>" title="<?php echo e($cat->title); ?>"><img src="<?php echo e(asset('images/category/'.$cat->image)); ?>" class="img-fluid" alt="<?php echo e($cat->title); ?>">
									<div class="cat-title"><?php echo e($cat->title); ?></div>
								</a>
							</div>
						</div>
					</div>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>				
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<?php $__env->stopSection(); ?> -->

<?php $__env->startSection('custom-scripts'); ?>
<script>
	
window._wdata = window._wdata || [];_wdata.push({widget_id: $(".sstk_widget").data("id"), cdn_prefix: '//d3qrz9uuaxc8ej.cloudfront.net', width:' 100%', height: '660', src: '//widget.shutterstock.com/widget/'
	+$(".sstk_widget").data("id"), border: false, url: document.URL});(function () {if (typeof (widget) !== 'undefined') return;var nwjs = document.createElement('script'); nwjs.type = 'text/javascript'; nwjs.async = true;nwjs.id = 'widget_script';nwjs.src = '//widget.shutterstock.com/content/js/embed_widget.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(nwjs, s);})();

 $(document).ready(function(){
  $('#myModal').on('show.bs.modal', function (e) {
    var text = $(e.relatedTarget).data('title');
   $('#imgid').attr("src",$(e.relatedTarget).data("src"));
    // $('#p').text(text);
  });
});

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
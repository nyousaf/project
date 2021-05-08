@extends('layouts.theme')
@section('main-content')
<!-- slider start -->
<section id="slider-section" class="slider-main-block parallax" style="background-image: url({{asset('images/slider-01.jpg')}})">
	<div class="overlay-bg"></div>
	<div class="container-fluid">
		<div class="slider-block">
			<div class="slider-dtl">
				<h1 class="slider-heading">Sealife</h1>
				<p>Marine life, or sea life or ocean life, is the plants, animals and other organisms that live in the salt water of the sea or ocean, or the brackish water of coastal estuaries. At a fundamental level, marine life affects the nature of the planet.</p>
			</div>
			
			<div class="search-block">
				{!! Form::open(['method' => 'GET', 'action' => 'SearchController@homeSearch', 'class' => 'search-form']) !!}
					{!! Form::text('search', null, ['class' => 'search-input', 'placeholder' => 'Search']) !!}
				  <button type="submit" class="search-button"><i class="fa fa-search"></i>
				  </button>
			  {!! Form::close() !!}
		  </div>
			{{-- <div class="slider-bottom">
				<span>Trending Searches :</span><a href="#">Corporate</a>, <a href="#">Nature</a>, <a href="#">Love</a>, <a href="#">House</a>
			</div> --}}
		</div>
	</div>	
</section>
<!-- slider end -->
<!-- work -->
<section id="work-section" class="work-main-block">
	
@section('custom-scripts')
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
@endsection

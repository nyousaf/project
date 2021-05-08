@extends('layouts.theme')
@section('main-content')
<!-- Map -->
<section id="page-section" class="page-main-block">
  <div class="container"> 
		<h4 class="search-heading">{{$search_title}} Photos</h4>
		@if(isset($results) && count($results)>0)
			<div class="work-main-block">
				<div class="row grid">
					@foreach($results as $key => $item)
						@if($item->workphotos)

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
  </div>
							<div class="col-lg-4 work-img-block">
								<div class="work-block">
									<a href="{{ url('photos/'.$item->uni_id.'/'.$item->slug) }}" title="{{$item->title}}">
										<img src="{{asset('images/work/'.$item->workphotos->first()->images)}}" class="img-fluid" alt="{{$item->title}}">	
										<div class="overlay-bg"></div>
										<div class="item-dtl">
										<h5 class="item-name">{{$item->categories->title}}</h5>
										<a href="{{url('profile/'.$item->users->uni_id.'/'.str_slug($item->users->name,'-'))}}" class="item-by">{{$item->users->name}}</a>
										</div>
										<div class="item-btn">


											@auth
                      	<a href="#" class="btn btn-white img-like {{ $item->isLiked == 1 ? 'active' : null }}" data-like="{{ $item->id }}" title="Like"><i class="fa fa-heart"></i> <span>{{$item->likes()->count()}}</span></a>
                      	<a href="#" class="btn btn-white img-fav {{ $item->isFavorite == 1 ? 'active' : null }}" data-fav="{{ $item->id }}" title="Collection"><i class="fa fa-plus"></i> <span>{{$item->favorites()->count()}}</span></a>
                      @else
                      	<a href="{{route('login')}}" class="btn btn-white img-like" title="like"><i class="fa fa-heart"></i> <span>{{$item->likes()->count()}}</span></a>
                      	<a href="{{route('login')}}" class="btn btn-white img-fav" title="Collection"><i class="fa fa-plus"></i> <span>{{$item->favorites()->count()}}</span></a>
                      @endauth
						<a href="{{asset('images/work/'.$item->workphotos->first()->images)}}" data-id="{{ $item->id }}" class="btn btn-white img-download" title="Download" download><i class="fa fa-download"></i><span>{{$item->download}}</span></a>
						 <a data-toggle="modal" href="#myModal" data-title="{{$item->title}}" data-src="{{asset('images/work/'.$item->workphotos->first()->images)}}" data-id="{{ $item->id }}" class="btn btn-white imag" title="Zoom"><i class="fa fa-eye"></i></a>
										</div>
									</a>
								</div>
							</div>
						@endif
					@endforeach
				</div>

			</div>
			
        {{-- {{ $results->links() }}  --}}
    @else
    	<h5>No Results Found</h5>
		@endif
		@if(isset($ad_settings))
@if($ad_settings->search_flag)
<section id="cat-section" class="cat-main-block">
		<div class="container" >
<div data-id='{{$ad_settings->Embedd_code}}'
  class='sstk_widget' style="width: 100%"><a href='http://affiliate.shutterstock.com' target='_blank'
  style='position: absolute;bottom: 0px; line-height: 40px; text-decoration: none;color: #333333; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size: 12px;'>
</a>
</div>
</div>
</section>
@endif
@endif		
	</div><!-- <a href="#" id="loadMore" class="btn btn-primary">Load More</a>
				<p class="totop"> 
    <a href="#top">Back to top</a> 
</p> -->
</section>
<!-- end work -->
@endsection
@section('custom-scripts')
<script>
	$(document).ready(function(){
  $('#myModal').on('show.bs.modal', function (e) {
    var text = $(e.relatedTarget).data('title');
   $('#imgid').attr("src",$(e.relatedTarget).data("src"));
    // $('#p').text(text);
  });
});

window._wdata = window._wdata || [];_wdata.push({widget_id: $(".sstk_widget").data("id"), cdn_prefix: '//d3qrz9uuaxc8ej.cloudfront.net', width: '100%', height: '660', src: '//widget.shutterstock.com/widget/'
	+$(".sstk_widget").data("id"), border: false, url: document.URL});(function () {if (typeof (widget) !== 'undefined') return;var nwjs = document.createElement('script'); nwjs.type = 'text/javascript'; nwjs.async = true;nwjs.id = 'widget_script';nwjs.src = '//widget.shutterstock.com/content/js/embed_widget.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(nwjs, s);})();

	</script>
	@endsection
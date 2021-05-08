@extends('layouts.theme')
@section('custom-meta')
<meta name="description" content="{{ $work->meta_desc }}" />
<meta name="keywords" content="{{ $work->meta_tag }}">
@endsection
@section('main-content')

@if(Session::has('delete'))
<script>
		alert('{{ Session::get("delete") }}');
</script>

@elseif(Session::has('added'))
<script>
		alert('{{ Session::get("added") }}');
</script>
@endif
<!-- product -->
<section id="product-section" class="product-main-block">
	<div class="container">
		@if(isset($work))
			<div class="row">
	<div class="{{$settings->sidebar_left == 1 ? 'col-lg-9 col-md-8 order-last' : 'col-lg-9 col-md-8'}}">
					<div class="product-block">
	          @if(isset($work->workphotos))
              <div class="product-img">
              	<img src="{{asset('images/work/'.$work->workphotos->first()->images)}}" class="img-fluid" alt="product-img">
              </div>
			      @endif
		        <div class="product-dtl">
	            <div class="product-heading">
	            	<h4 class="product-title">{{$work->title}}</h4>
	            	<div class="product-sub-heading">{{$work->categories->title}}</div>
	            </div>
	            <div class="product-desc">
	              <p>{{$work->desc}}</p> 
	            </div>
          	</div>
          </div> 
          @if($work->status == '1')
	          <div class="post-reply-form-main">
							<h6 class="post-heading">Leave A Comment</h6>
							 @auth
							<div class="row">
								<div class="col-lg-2 text-center">
									<div class="post-profile-img">
										
											<img src="{{asset('images/user/'.$auth->image)}}" class="img-fluid" alt="{{$auth->title}}">
										
									
									</div>
								</div>
								<div class="col-lg-10">
									<div class="post-form-block">
										<form id="post-form" class="post-form" action="{{ action('UserDashboardController@comment') }}" method="POST">
	            				{{ csrf_field() }}
											<input type="hidden" value="{{ $work->id }}" name="work_id">
											<div class="form-group">
												<textarea id="summernote-main" name="body" class="summernote-main form-control"></textarea>
											</div>
	                                       
												<button type="submit" class="btn btn-primary">Submit</button>
											
				            </form>
									</div>
								</div>
							</div>
							@else
							    <a href="{{route('login')}}" class="btn btn-outline-primary">Sign in</a>
							   
											@endauth
						</div>
		        @if(isset($work->comments))
							@foreach($work->comments as $comment)
							@if($comment->status == 1)
								<div class="post-block post-reply">
									<div class="row">
										<div class="col-lg-2 col-md-3">
											<div class="post-author-block">
												<div class="post-profile-img">
													<img src="{{asset('images/user/'.$comment->users->image)}}" class="img-fluid" alt="user-img">
												</div>
											</div>
										</div>
										<div class="col-lg-10 col-md-9">
											<div class="post-body-block">
												<a href="{{url('profile/'.$comment->users->uni_id.'/'.str_slug($comment->users->name,'-'))}}" title="{{$comment->users->name}}"><h6 class="post-author">{{$comment->users->name}}</h6></a>
												<div class="post-body-content">		
													<p>{!!$comment->body!!}</p>
												</div>
												<div class="post-time text-right"><i class="far fa-clock"></i>Posted {{$comment->created_at->diffforhumans()}}
												</div>
											</div>
										</div>
									</div>
								</div>
								@endif
							@endforeach
						@endif
					@endif
		    </div>
        <div class="col-lg-3 col-md-4">
         </br> 
	        <div class="widget-block profile-widget">
	        	<div class="widget-profile-img">
	        	<a href="{{url('profile/'.$work->users->uni_id.'/'.str_slug($work->users->name,'-'))}}">
              <img src="{{asset('images/user/'.$work->users->image)}}"  alt="User"></a>
            </div>
            <div class="widget-profile-dtl">
	            <a href="{{url('profile/'.$work->users->uni_id.'/'.str_slug($work->users->name,'-'))}}"><div class="widget-username">{{$work->users->name}}</div></a>
	           	<div class="widget-photos"> {{$work->users->works->count()}} Photos</div> </br>
	          
	            <!-- @if(isset($paypalid) && !empty($paypalid) && !is_null($paypalid))
	              <button type="button" id="coffee-btn" class="btn btn-success btn-sm"><a style="color:white;" target="_blank" href="{{ url($paypalid) }}">Coffee</a></button>
                 @endif -->
                  @auth
	              <button type="button" id="follow-btn" class="btn btn-outline-info btn-sm widget-follow-btn" data-follow="{{ $work->users->id }}">{{ $work->users->followers()->where('follower_id', $auth->id)->first() ? 'Unfollow' : 'Follow' }}</button>
	            @else
	              <a href="{{route('login')}}" class="btn btn-outline-info btn-sm">Follow</a>
	            @endauth
	          </div>
	        </div>  
	        @if($work->status == '1')
	        	<div class="widget-block btn-widget" style="width: 320px;">
							<div class="joint-btn">
								@auth
	              	<a href="#" class="btn btn-primary img-like {{ $work->isLiked == 1 ? 'active' : null }}" data-like="{{ $work->id }}"
	              	 title="Like"><i class="fa fa-heart"></i> <span>{{$work->likes()->count()}}</span></a>
	              	<a href="#" class="btn btn-primary img-fav {{ $work->isFavorite == 1 ? 'active' : null }}" data-fav="{{ $work->id }}" title="Collection"><i class="fa fa-plus"></i> <span>{{$work->favorites()->count()}}</span> </a>
	              @else
	              	<a href="{{route('login')}}" class="btn btn-primary" title="like"><i class="fa fa-heart"></i> <span>{{$work->likes()->count()}}</span></a>
	              	<a href="{{route('login')}}" class="btn btn-primary" title="Collection"><i class="fa fa-plus"></i> <span>{{$work->favorites()->count()}}</span> </a>
	              @endauth
	             <a href="{{asset('images/work/'.$work->workphotos->first()->images)}}" data-id="{{ $work->id }}" class="btn btn-primary img-download" title="Download" download><i class="fa fa-download"></i><span>{{$work->download}}</span></a>
	              @if($work->is_psd)
	              <a href="{{asset('images/work/'.$work->zip)}}" class="btn btn-primary img-download" download><i class="fa fa-download"></i> <span>.psd/.ai</span> </a>
	              @endif

								@php														
									$facebook = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->facebook();
									$twitter = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->twitter();
									$gplus = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->gplus();
									$linkedin = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->linkedin();
									$pinterest = Share::load(url('post/'.$work->uni_id.'/'.$work->slug), 'Sharing')->pinterest();
								@endphp
	              <div class="share-button" >
	              	<a class="btn btn-primary share-btn"><i class="fa fa-share-alt"></i></a>
									<div class="social-icon top sharer">
										<a class="facebook-icon" href="{{$facebook}}"><i class="fa fa-facebook-f"></i></a>
										<a class="google-icon" href="{{$gplus}}"><i class="fa fa-google-plus"></i></a>
									  <a class="twitter-icon" href="{{$twitter}}"><i class="fa fa-twitter"></i></a>
									  <a class="pinterest-icon" href="{{$pinterest}}"><i class="fa fa-pinterest"></i></a>
									  <a class="linkedin-icon" href="{{$linkedin}}"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
	            </div>
		        </div>
			  @endif
			
			@auth
			  @php
			  	 $reportfinds = App\ReportImage::where('photo_id','=',$work->id)->where('user_id','=',Auth::user()->id)->first();
			  @endphp

			 @isset($reportfinds)
			 <a style="margin-top:-15px;" class="btn btn-primary"><i class="fa fa-check"></i> You Already reported this image</a>
			 @else
			 <a data-toggle="modal" data-target="#reportbtn" style="margin-top:-15px;" class="btn btn-primary"><i class="fa fa-warning"></i> Report</a>
			 <p></p>
				
			   <!-- Modal -->
			   <div class="modal fade" id="reportbtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					   <div class="modal-dialog" role="document">
					   <div class="modal-content">
						   <div class="modal-header">
						   <h5 class="modal-title" id="exampleModalLabel">Report Image: {{ $work->title }}</h5>
						   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							   <span aria-hidden="true">&times;</span>
						   </button>
						   </div>
						   <div class="modal-body">
							   <form action="{{ route('report.image',$work->id) }}" method="POST">
								   {{ csrf_field() }}
								<div class="form-group">
									   <label>Report Title :</label>
									   <input name="title" required placeholder="Report title" type="text" class="form-control">
								</div>

								<div class="form-group">
									   <label>Describe Issue :</label>
									   <textarea name="desc" required placeholder="Describe your issue" class="form-control" rows="5" cols="20"></textarea>
								</div>

								<div class="form-group">
									<input type="submit" class="btn btn-md btn-primary">
								</div>
								
							   </form>
						   </div>
						   
					   </div>
					   </div>
			   </div>
			 @endisset
			@endauth
			 

			  <!-- <div class="widget-block info-widget">
				  @if($work->license != "0" && $work->license != null)
				  <b>License:</b> <a title="{{ $work->license->title }}" style="text-decoration:underline" href="{{ route('lic.show',$work->license->slug ) }}">{{ $work->license->title }}</a>
				  @else
				  <b>License:</b> No License
				  @endif
				</div> -->

		      <div class="widget-block info-widget">
		        <table class="info-table">
            	<tbody class="info">
            		<!-- @if($work->type)
	          			<tr>
	          				<th>Image Type</th>
	          				<td>{{$work->type}} </td>
	          			</tr>
	          		@endif
	          		@if($work->width && $work->length)
	          			<tr>
	          				<th>Resolution</th>
	          				<td>{{$work->width}} * {{$work->length}}</td>
	          			</tr>
          			@endif
          			<tr>
          				<th>Views</th>
          				<td>{{$work->views()->count()}}</td>
          			</tr> -->
          			<!-- @if($work->model)
	          			<tr>
	          				<th>Model</th>
	          				<td>{{$work->model}}</td>
	          			</tr>
	          		@endif
	          		@if($work->aperture)
	          			<tr>
	          				<th>Aperture</th>
	          				<td>{{$work->aperture}}</td>
	          			</tr>
	          		@endif
	          		@if($work->iso)
	          			<tr>
	          				<th>ISO</th>
	          				<td>{{$work->iso}}</td>
	          			</tr>
	          		@endif
	          		@if($work->focal_len)
	          			<tr>
	          				<th>Focal Length</th>
	          				<td>{{$work->focal_len}}</td>
	          			</tr>
	          		@endif
	          		@if($work->shutter_speed)
	          			<tr>
	          				<th>Shutter Speed</th>
	          				<td>{{$work->shutter_speed}}</td>
	          			</tr>
	          		@endif
	          		@if($work->taken_date)
	          			<tr>
	          				<th>Clicked On</th>
	          				<td>{{$work->taken_date}}</td>
	          			</tr>
	          		@endif -->
          			<tr>
          				<th>Posted</th>
          				<td>{{$work->created_at->diffForHumans()}}</td>
          			</tr>
            	</tbody>
            </table> 
		      </div>
		      <!-- <div class="widget-block tag-widget">		        
						@if(isset($tags) && count($tags)>0)
							<div class="tagcloud">
		            <h6 class="widget-heading">Tag Widget</h6>
		            <div class="tags">		            	
									@foreach($tags as $tag)
		              	<a href="{{ url('search/'.$tag->slug) }}"><span class="badge">{{$tag->title}}</span></a>
		              @endforeach
		            </div>       
		        	</div>
		        @endif
		      </div> -->
        	<div class="widget-block category-widget">
        		@if(isset($category) && count($category)>0)
            	<h6 class="widget-heading">Categories</h6>
            	<div class="row">
            		 <input value='{{$count=1}}'    hidden/>
								@foreach($category as $cat)
								@if($count<=9)
							<div class="col-lg-4 cat-block">
            				<div class="widget-category-content">
											<a href="{{ url('category/'.$cat->slug) }}" title="{{$cat->title}}">	<img src="{{asset('images/category/'.$cat->image)}}" class="img-fluid" alt="{{$cat->title}}">
												<div class="widget-cat-title">{{$cat->title}}</div>
											</a>
										</div>
									</div>
							<input value='{{$count++}}'    hidden/>
							@else
							<a class="btn btn-sm btn-outline-info" href="{{ url('/category') }}">Show All...</a>
							@break
							@endif
									
								@endforeach
            	</div>
            @endif
        	</div>
        	@if(isset($ad_setings))
        	@if($ad_settings->image_flag)
 
        	<div class="widget-block category-widget">
        		<div  data-id='{{$ad_settings->Embedd_code}}' 
  class='sstk_widget' style="margin-left: -15px;">
  <a href='http://affiliate.shutterstock.com' target='_blank'
  style='position: absolute;bottom: 0px; line-height: 40px; text-decoration: none;color: #333333; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size: 12px;'>
Powered by Shutterstock</a>
</div>
        	</div>
@endif
@endif
		    </div>
		  </div>
		@endif
	</div> 
	@if($work->status == '1')
		<div class="container">
			<div class="related-images-block">
				@if(isset($cat_img))
					<h4 class="related-heading"> Related Images</h4>
				  <div class="row grid">
						@foreach($cat_img as $key => $item)
							@if($item->workphotos->first())
								<div class="col-lg-3 work-img-block">
									<div class="work-block">
										<a href="{{ url('photos/'.$item->uni_id.'/'.$item->slug) }}" title="{{$item->title}}">
											<img src="{{asset('images/work/'.$item->workphotos->first()->images)}}" class="img-fluid" alt="{{$item->title}}">	
											<div class="overlay-bg"></div>
											<div class="item-dtl">
												<h5 class="item-name">{{$item->categories->title}}</h5>
												<a href="#" class="item-by">{{$item->users->name}}</a>
											</div>
											<div class="item-btn">
												@auth
	                      	<a href="#" class="btn btn-white img-like {{ $item->isLiked == 1 ? 'active' : null }}" data-like="{{ $item->id }}" title="Like"><i class="fa fa-heart"></i> <span>{{$item->likes()->count()}}</span></a>
	                      	<a href="#" class="btn btn-white img-fav {{ $item->isFavorite == 1 ? 'active' : null }}" data-fav="{{ $item->id }}" title="Collection"><i class="fa fa-plus"></i> <span>{{$item->favorites()->count()}}</span></a>
	                      @else
	                      	<a href="{{route('login')}}" class="btn btn-white img-like" title="like"><i class="fas fa-heart"></i> <span>{{$item->likes()->count()}}</span></a>
	                      	<a href="{{route('login')}}" class="btn btn-white img-fav" title="Collection"><i class="fa fa-plus"></i> <span>{{$item->favorites()->count()}}</span></a>
	                      @endauth
	  
	<a href="{{asset('images/work/'.$item->workphotos->first()->images)}}" data-id="{{ $item->id }}" class="btn btn-white img-download" title="Download" download><i class="fa fa-download"></i><span>{{$item->download}}</span></a>

											</div>
										</a>
									</div>
								</div>
							@endif
					  @endforeach
				  </div>
				@endif
			</div>
		</div>
	@endif
</section>
@endsection
@section('custom-scripts')
<script>
	
	
window._wdata = window._wdata || [];_wdata.push({widget_id: $(".sstk_widget").data("id"), cdn_prefix: '//d3qrz9uuaxc8ej.cloudfront.net', width: '380', height: '600', src: '//widget.shutterstock.com/widget/'
	+$(".sstk_widget").data("id"), border: false, url: document.URL});(function () {if (typeof (widget) !== 'undefined') return;var nwjs = document.createElement('script'); nwjs.type = 'text/javascript'; nwjs.async = true;nwjs.id = 'widget_script';nwjs.src = '//widget.shutterstock.com/content/js/embed_widget.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(nwjs, s);})();




var urlLike = '{{ route('user.follow') }}';
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
@endsection
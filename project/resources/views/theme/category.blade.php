@extends('layouts.theme')
@section('main-content')
<!-- work -->
<section id="work-section" class="work-main-block">
	<div class="container">
		<div class="section text-center">
			<h2 class="section-heading">{{$category->title}}</h2>
		</div>
		@if(isset($category))
			<div class="work-sec-dtl">
				<div class="row grid">
					@foreach($category->works as $key => $item)
						@if($item->status == '1')
							@if($item->workphotos->first())
								<div class="col-lg-4 work-img-block">
									<div class="work-block">
										<a href="{{ url('photos/'.$item->uni_id.$url) }}" title="{{$item->title}}">
											<img src="{{asset('images/work/'.$item->workphotos->first()->images)}}" class="img-fluid" alt="{{$item->title}}">		
											<div class="overlay-bg"></div>
											<div class="item-dtl">
												<h5 class="item-name">{{$item->categories->title}}</h5>
												<div class="like-btn"><a href="#" class="btn btn-white"><i class="fa fa-heart"></i></a></div>
											</div>
										</a>
									</div>
								</div>
							@endif
						@endif
					@endforeach 
				</div>
			@endif		
		</div>			
	</div><!-- <a href="#" id="loadMore" class="btn btn-primary">Load More</a>
				<p class="totop"> 
    <a href="#top">Back to top</a> 
</p> -->
</section>
<!-- end work -->
@endsection